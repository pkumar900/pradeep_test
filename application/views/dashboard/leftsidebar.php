
<section>

<aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?= base_url()?>assets/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$this->session->userdata('email')?></div>
                    <div class="email"><?=$this->session->userdata('name').' '.$this->session->userdata('last_name') ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?=base_url().'Login/logout'?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="#">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                      <?php if($this->session->userdata('role')==ADMIN){ ?>
                    <li>
                        <a href="<?= base_url('Branches')?>">
                            <i class="material-icons">text_fields</i>
                            <span>Manage Store(Branches)</span>
                        </a>
                    </li>
                <?php } ?>
                     <li>
                        <a href="<?= base_url('Employees')?>">
                            <i class="material-icons">person_add</i>
                            <span>Manage Employees</span>
                        </a>
                    </li>
                     <li>
                        <a href="#">
                            <i class="material-icons">text_fields</i>
                            <span>Manage Stocks</span>
                        </a>
                    </li>
                     <li>
                        <a href="#">
                            <i class="material-icons">text_fields</i>
                            <span>Manage Offers</span>
                        </a>
                    </li>
                     <li>
                        <a href="#">
                            <i class="material-icons">person_add</i>
                            <span>Manage Customers</span>
                        </a>
                    </li>
                   
                    
                    <!-- <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">trending_down</i>
                            <span>Multi Level Menu</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Menu Item</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Menu Item - 2</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Level - 2</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <span>Menu Item</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <span>Level - 3</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <span>Level - 4</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> -->
                    
                   
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019 - 2020 <a href="javascript:void(0);">Bglooks -</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>

