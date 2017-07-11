<?php

/**
 * Default App view layout. Copied from the BootStrap-UI template.
 */
use Cake\Core\Configure;

/**
 * Default `html` block.
 *
 * Note *all* of our CSS overrides are defined in this block. Most customization is done using
 * a custom Bootstrap LESS config, so any CSS here should be limited to adjusting the viewport
 * parameters.
 */
$localStyle =
    <<<STYLE
<style>
        body, html {
            height: 100%;
            margin: 0px;
        }
        .navbar {
            height: 7%;
        }
        .container {
            height: 85%;
            width: 100%;
            overflow: auto;
        }
        #footer {
            height: 7%;
            width: 100%;
            background-color: #eee;
            align: bottom;
            padding: 6px;
        }
        #footer-txt {
            margin: 8px;
        }
    </style>
STYLE;

/**
 * Opening `html` block.
 */
if (!$this->fetch('html')) {
    $this->start('html');
    printf('<html lang="%s" class="no-js">', Configure::read('App.language'));
    $this->end();
}

/**
 * Opening `title` block.
 */
if (!$this->fetch('title')) {
    $this->start('title');
    echo Configure::read('competition');
    $this->end();
}

/**
 * Opening `header` block.
 */
if (!$this->fetch('tb_nav')) {
    $this->start('tb_nav');
    $navListLeft = [
        $this->Html->link(__('Home'), ['controller' => 'pages', 'action' => 'index']),
        $this->Html->link(__('Rules'), ['controller' => 'pages', 'action' => 'rules']),
        $this->Html->link(__('Entries'), ['controller' => 'entries', 'action' => 'index']),
        $this->Html->link(__('Locations'), ['controller' => 'locations', 'action' => 'index']),
        $this->Html->link(__('Judging'), ['controller' => 'sessions', 'action' => 'index']),
    ];
    $navListRight = [
        $this->Html->link(__(''),
            ['controller' => 'users', 'action' => 'index'],
            ['class' => 'glyphicon glyphicon-user']),
        $this->Html->link(__(''),
            ['controller' => 'users', 'action' => 'logout'],
            ['class' => 'glyphicon glyphicon-log-out']),
    ];
    /**
    echo '<div class="navbar-header">';
    echo ('<span class="navbar-brand">' .
        $this->Html->link(__('CompCake'),
        ['controller' => 'pages', 'action' => 'index']) .
        '</span>');
    echo '</div>';
     **/
    echo '<ul class="nav navbar-nav navbar-left">';
    foreach ($navListLeft as $nav) {
        echo '<li>' . $nav . '</li>';
    }
    echo '</ul>';
    if (!is_null($this->request->session()->read('Auth.User.email'))) {
        echo '<ul class="nav navbar-nav navbar-right">';
        foreach ($navListRight as $nav) {
            echo '<li>' . $nav . '</li>';
        }
        echo '</ul>';
    }
    echo '</nav>';
    $this->end();
}
/**
 * Default `footer` block.
 */
if (!$this->fetch('tb_footer')) {
    $this->start('tb_footer');
    echo '<footer><span id="footer-txt">Powered by CompCake v3.3, &copy; 2017 Eric Lowe</span></footer>';
    $this->end();
}

/**
 * Default `body` block.
 */
$this->prepend('tb_body_attrs', ' class="' . implode(' ', [$this->request->controller, $this->request->action]) . '" ');
if (!$this->fetch('tb_body_start')) {
    $this->start('tb_body_start');
    echo '<body' . $this->fetch('tb_body_attrs') . '>';
    $this->end();
}
/**
 * Default `flash` block.
 */
if (!$this->fetch('tb_flash')) {
    $this->start('tb_flash');
    if (isset($this->Flash))
        echo $this->Flash->render();
    $this->end();
}
if (!$this->fetch('tb_body_end')) {
    $this->start('tb_body_end');
    echo '</body>';
    $this->end();
}

/**
 * Prepend `meta` block with `author` and `favicon`.
 */
$this->prepend('meta', $this->Html->meta('author', null, ['name' => 'author', 'content' => Configure::read('App.author')]));
$this->prepend('meta', $this->Html->meta('favicon.ico', '/favicon.ico', ['type' => 'icon']));

/**
 * Prepend `css` block with Bootstrap stylesheets and append
 * the `$html5Shim`.
 */
$html5Shim =
    <<<HTML
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
HTML;
$this->prepend('css', $this->Html->css(['bootstrap/bootstrap']));
$this->prepend('css', $this->Html->css("http://fonts.googleapis.com/css?family=Titillium+Web:400,300,700&amp;subset=latin,latin-ext"));

$this->append('css', $html5Shim);

/**
 * Prepend `script` block with jQuery and Bootstrap scripts
 */
$this->prepend('script', $this->Html->script(['jquery/jquery.min', 'bootstrap/bootstrap.min']));

/**
 * Allow controllers to override the default title view block by setting the $title variable.
 */
if (isset($title)) {
    $this->assign('title', $title);
}

?>
<!DOCTYPE html>

<?= $this->fetch('html') ?>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1" />

    <?= $localStyle ?>

    <title><?= Configure::read('competition') . ': ' . $this->fetch('title') ?></title>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>

<?php
echo $this->fetch('tb_body_start');
echo '<nav class="navbar navbar-default"><div class="container-fluid">';
    echo $this->fetch('tb_nav');
echo '</div></nav>';
echo $this->fetch('tb_flash');
echo '<div class="container">';
    echo $this->fetch('content');
echo '</div>';
echo '<div class="container-fluid" id="footer">';
    echo $this->fetch('tb_footer');
echo '</div>';
echo $this->fetch('script');
echo $this->fetch('tb_body_end');
?>

</html>
