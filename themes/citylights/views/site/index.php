<?php $this->pageTitle=Yii::app()->name; ?>
<!-- demo content for the Artisteer theme -->
        <div class="art-post-inner art-article">
            <h2 class="art-postheader">
                Welcome
            </h2>
            <div class="art-postcontent">
                <!-- article-content -->


                <p>
                    This is the insurance supermarket - onestop shop for all insurance products. 
                    We bring together all insurance providers and their clients, offering a wide ready market 
                    to the former and convenience to the latter!
                </p>
                <div class="cleared"></div>
                <div class="art-content-layout overview-table">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell">
                            <div class="overview-table-inner">
                                <h4><?php  echo CHtml::link("Insurance Providers",array("/provider")); ?></h4>
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/css/images/01.png" width="55px" height="55px" alt="an image" class="image" />
                                <p>You are a provider of insurance services and have investigators as employees 
                                    ready to investigate claims, this is your area. Sign up, add policies, then 
                                add investigator(s). After that, you can sit back and wait for clients. </p>
                            </div>
                        </div><!-- end cell -->
                        <div class="art-layout-cell">
                            <div class="overview-table-inner">
                            <h4><?php  echo CHtml::link("Claim Investigators",array("/investigator")); ?></h4>
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/css/images/02.png" width="55px" height="55px" alt="an image" class="image" />
                                <p>If you are a claim investigator for an insurance company this is your section. Claim investigators 
                                    are added by their respective provider companies. </p>
                            </div>
                        </div><!-- end cell -->
                        <div class="art-layout-cell">
                            <div class="overview-table-inner">
                            <h4><?php  echo CHtml::link("Clients",array("/")); ?></h4>

                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/css/images/03.png" width="55px" height="55px" alt="an image" class="image" />
                                <p>This is your place if you are a consumer of insurance products. On this platform we provide you with 
                                    products from multiple providers, giving you the convenience to choose at the comfort of 
                                your couch. </p>
                            </div>
                        </div><!-- end cell -->
                    </div><!-- end row -->
                </div><!-- end table -->

                <!-- /article-content -->
            </div>
            <div class="cleared"></div>
        </div>

        <div class="cleared"></div>
      </div>
    </div>
  </div>
</div>  <!-- closing tags for column1.php art-post div -->
