<?php
/**
 * @var \Pimcore\Bundle\PimcoreBundle\Templating\PhpEngine $this
 * @var \Pimcore\Bundle\PimcoreBundle\Templating\PhpEngine $view
 * @var \Pimcore\Bundle\PimcoreBundle\Templating\GlobalVariables\GlobalVariables $app
 */

$this->extend('WebsiteDemoBundle::layout.html.php');

?>

<?php
// set page meta-data
$this->headTitle()->set($this->news->getTitle());

// TODO HEAD META HELPER
// $this->headMeta($this->news->getShortText(), "description");

/** @var \Pimcore\Model\Object\News $news */
$news = $this->news;
?>

<section class="area-wysiwyg">

    <div class="page-header">
        <h1><?= $news->getTitle(); ?></h1>
    </div>

    <div class="lead">
        <p><?= $news->getShortText(); ?></p>
    </div>

    <?= $news->getText(); ?>

    <div class="row">
        <?php for ($i = 1; $i <= 3; $i++) { ?>

            <?php
            /** @var \Pimcore\Model\Document\Tag\Image $image */
            $image = $news->{"getImage_" . $i}();
            ?>

            <?php if ($image) { ?>
                <div class="col-lg-3">
                    <a href="<?= $image->getThumbnail("galleryLightbox"); ?>" class="thumbnail">
                        <?= $image->getThumbnail("galleryThumbnail")->getHTML(); ?>
                    </a>
                </div>
            <?php } ?>

        <?php } ?>
    </div>

</section>
