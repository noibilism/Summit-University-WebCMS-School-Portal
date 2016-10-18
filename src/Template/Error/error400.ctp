<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = 'default';
$this->assign('title', h($error->getMessage()));

if (Configure::read('debug')):
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.ctp');

    $this->start('file');
    ?>
    <?php if (!empty($error->queryString)): ?>
        <p class="notice">
            <strong>SQL Query: </strong>
            <?=h($error->queryString)?>
        </p>
    <?php endif;?>
<?php if (!empty($error->params)): ?>
        <strong>SQL Query Params: </strong>
        <?php Debugger::dump($error->params)?>
<?php endif;?>
<?=$this->element('auto_table_warning')?>
<?php
if (extension_loaded('xdebug')):
    xdebug_print_function_stack();
endif;

$this->end();
endif;
?>
<?php
if ($this->request->session()->read('Auth.User')
    && isset($this->request->params['prefix'])
    && $this->request->params['prefix'] === 'admin'):
?>
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title"><div class="title"><?=__('Error {0}', $code)?></div></div>
            </div>
            <div class="card-body">
                <p class="text-danger"><?=$error->getMessage()?></p>
                <p><?=$this->Html->link('<i class="glyphicon glyphicon-triangle-left"></i>&nbsp;' . __('Back to home'), ['controller' => 'Dashboard', 'action' => 'index'], ['class' => 'btn btn-success', 'escape' => false])?></p>
            </div>
        </div>
    </div>
</div>
<?php
else:
    $this->layout = 'default';
    ?>
    <legend><?=__('Error {0}', $code)?></legend>
<div class="col-lg-12 col-md-12"><!-- doc body wrapper -->

    <div class="col-padded"><!-- inner custom column -->

        <h1 class="page-title text-center">404 Error</h1>

        <div class="news-body">

            <div class="row"><!-- row -->

                <div class="col-lg-12">
                    <figure class="thumb-404">
                        <img src="img/404_error_image.png" alt="Error Image" class="img-responsive aligncenter" />
                    </figure>
                </div>

                <div class="col-lg-12">
                    <h6 class="text-center">Ooops!</h6>
                    <p class="text-center">
                        Sorry, requested page can not be found or it doesn't exist.<br />
                    <p class="text-danger"><?=$error->getMessage()?></p>
                    </p>
                </div>

            </div><!-- row end -->

        </div>

    </div><!-- inner custom column end -->

</div><!-- doc body wrapper end -->
<?php
endif;
?>