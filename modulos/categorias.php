<aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Categorías</h4>
                            <ul class="list cat-list">
                            <?php 
                            $cat = new blog();
                            $allcat = $cat -> contarCategorias();
                             ?>
                            <?php foreach ($allcat as $scat) { ?>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p><?php echo $scat['categoria'];?></p>
                                        <p>(<?php echo $scat['count(*)'];?>)</p>
                                    </a>
                                </li>
                                <?php 
                                }                            
                                 ?>

                            </ul>
    </aside>
