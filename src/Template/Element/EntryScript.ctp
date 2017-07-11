<?php
$this->append('css', $this->Html->css(['selectize']));
$this->append('script', $this->Html->script(['jquery/selectize.min', 'jquery/jquery.bjcpstyles']));
$this->append('script');
?>
    <script>
        $(document).ready(function() {
            $('#style').bjcpselect().selectize();
        });
    </script>
<?php $this->end() ?>