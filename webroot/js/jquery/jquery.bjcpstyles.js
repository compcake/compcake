/**
 * BJCP Styles jQuery Plugin
 *
 * (c) 2017 Eric Lowe <eric@meridianhive.com>
 *
 * Released under the MIT license
 *
 * Prerequisites --
 *
 *   - jQuery 1.6+
 *   - styleguide.xml in your webroot at /xml/styleguide.xml
 *
 *     The BJCP style guide XML can be found on GitHub:
 *     https://github.com/meanphil/bjcp-guidelines-2015
 *
 *   If your competition is using custom styles, just add them to a new
 *   custom class in the XML file, following the standardized format.
 *
 *   If there are any styles you don't want to show up in the pick list,
 *   you can just remove from the XML.
 *
 *   It is not recommended you deviate from the style guideline's default
 *   category numbers, since that confuses your participants. If you want
 *   to modify an existing BJCP category it is recommended you use a custom
 *   category number such as "99A", "M88C", "C94" or "66F" instead.
 *
 * Usage --
 *
 *   There are two methods provided by this script -- a jQuery style
 *   selector, and a jQuery subcategory translator.
 *
 *   For example, to use the style selector on the select element whose ID is
 *   "bjcp":
 *
 *     <span id="cider">... cider specific input elements (apples) ...</span>
 *     <span id="mead">... mead specific input elements (honey, strength) ...</span>
 *     <span id="meadcider">... mead and cider specific input elements (carb, sweetness) ...</span>
 *     <select id="bjcp" name="style"><option value="1B" selected="selected">1B</option></select>
 *
 *   Use the following code in your page:
 *
 *     <script src="js/jquery/jquery.bjcpstyles.js"></script>
 *     <script>
 *         $(document).ready(function() {
 *             $("#bjcp").bjcpselect();
 *         });
 *     </script>
 *
 *   This will replace the element contents on the page with:
 *
 *     <select id="bjcp" name="style" value="1B">
 *         <option value="1A">1A - American Light Lager</option>
 *         <option value="1B" selected>1B - American Lager</option>
 *         ...
 *         <option value="66F">66F - Really Evil Custom Style Ale</option>
 *     </select>
 *
 *   When the user selects a style from the dropdown which has additional entry instructions
 *   (eg. must specify wood type for a wood-aged beer), an alert() dialog will be displayed with
 *   the special instructions.
 *
 *   When the user selects a style starting with "M" or "C" (eg. a mead or cider),
 *   if found, any div/span with an id of "mead" or "cider" will be shown and the required
 *   attributes on the elements of that div/span will be set; otherwise, these div/span elements
 *   will be hidden, and the required attribute cleared.
 *
 * Subcategory Translator Example --
 *
 *   To update the text of all view elements in the "bjcp" class whose element text
 *   is a subcategory number, like this:
 *
 *     <span class="bjcp">1B</span>
 *
 *   Use the following code:
 *
 *     <script src="js/jquery/jquery.bjcpstyles.js"></script>
 *     <script>
 *         $(document).ready(function() {
 *             $(".bjcp").bjcptext();
 *         });
 *     </script>
 *
 *   This would replace the page text with:
 *
 *     <span class="bjcp">American Lager (1B)</span>
 */
(function($) {
    var $xml;

    function init() {
        $.ajax({
            url: '/xml/styleguide.xml',
            dataType: "xml",
            success: function(xmlData) {
                $xml = $(xmlData);
            },
            async: false,
            error: function () {
                alert("Error: unable to read /xml/styleguide.xml on this page");
            }
        });
    }

    function appendOptions($node) {
        var value;
        if ($node.find("[selected]").length) {
            value = $node.find("[selected]").attr("value");
        }
        $node.empty();
        $xml.find("subcategory").each(function() {
            var subcat = $(this).attr('id'),
                subcatName = $(this).find("name").text(),
                $option = $("<option></option>").
                    attr("value", subcat).
                    text(subcat + " - " + subcatName);
            if (value == subcat) {
                showElements(value.substr(0,1));
                $option.attr("selected", true);
            }
            $node.append($option);
        });
        return $node;
    }

    function replaceText($node) {
        var subcat = $node.text(),
            selector = "#" + subcat,
            subcatName = $xml.find(selector).find("name").text();
        $node.text(subcatName + " (" + subcat + ")");
        return $node;
    }

    function showElements(firstChar) {
        $("#mead,#cider,#meadcider").hide().find(":input").removeAttr("required");
        if (firstChar) {
            if (firstChar === "M") {
                $("#mead,#meadcider").show().find(":input").attr("required", true);
            } else if (firstChar === "C") {
                $("#cider,#meadcider").show().find(":input").attr("required", true);
            }
        }
    }

    $.fn.bjcpselect = function() {
        if ($xml === undefined) {
            init();
        }
        return this.each(function() {
            showElements(null);
            appendOptions($(this));
            $(this).on("change", function() {
                var selectedValue = $(this).find("[selected]").attr("value");
                showElements(selectedValue.substr(0,1));
                $xml.find("subcategory[id=\"" + selectedValue + "\"]").each(function() {
                    var $e = $(this).find("entry_instructions");
                    if ($e.length > 0) {
                        alert($e.text());
                    }
                });
            });
        });
    };

    $.fn.bjcptext = function() {
        if ($xml === undefined) {
            init();
        }
        return this.each(function() {
            replaceText($(this));
        });
    };
} (jQuery));