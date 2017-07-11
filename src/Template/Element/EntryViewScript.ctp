<?php
$this->append('script', $this->Html->script(['jquery/jquery.bjcpstyles']));
$this->append('script');
?>
    <script>
        $(document).ready(function() {
            $('.bjcp').bjcptext();
        });
    </script>
<?php $this->end() ?>