<?php
$this->append('script');
?>
    <script>
        function printLabels() {
            w=window.open();
            w.document.write($('.printable-area').html());
            w.print();
            w.close();
        }
        $(document).ready(function() {
            printLabels();
            $('.printable-area').hide();
        });
    </script>
<?php $this->end() ?>