
        <div class="mdk-drawer js-mdk-drawer" id="default-drawer"> 
            <div class="mdk-drawer__content ">
                <div class="sidebar sidebar-left sidebar-dark bg-dark o-hidden" data-perfect-scrollbar>
                    <div class="sidebar-p-y">
                        <div class="sidebar-heading">ADMIN</div>
                        <ul class="sidebar-menu sm-active-button-bg">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/index')?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_box</i> Admin
                                </a>
                            </li>
                        </ul>

                        <!-- Site Administration -->
                        <div class="sidebar-heading">Site Administration</div>
                        <ul class="sidebar-menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" data-toggle="collapse" href="#board_menu">
                                    Course Setup
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu sm-indent collapse" id="board_menu">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/setup_board')?>">
                                            <span class="sidebar-menu-text">Board</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/setup_class');?>">
                                            <span class="sidebar-menu-text">Class  </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/setup_course');?>">
                                            <span class="sidebar-menu-text"> Course </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/setup_chapters');?>">
                                            <span class="sidebar-menu-text"> Chapters</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/setup_sections');?>">
                                            <span class="sidebar-menu-text">Sections</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--Book Stores Management-->
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button " data-toggle="collapse" href="#book_management">Books Store
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu sm-indent collapse" id="book_management">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/books');?>">
                                            <span class="sidebar-menu-text"> Books</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/current_orders');?>">
                                            <span class="sidebar-menu-text">Current Order's</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-menu-item ">
                                <a class="sidebar-menu-button sidebar-js-collapse" data-toggle="collapse" href="#site-administration">Fees
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu sm-indent collapse show" id="site-administration">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/set_up_fees')?>">
                                            <span class="sidebar-menu-text">Setup Fees</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/collect_fees')?>">
                                            <span class="sidebar-menu-text">Collect Fees</span>
                                        </a>
                                    </li>
                                    <!--<li class="sidebar-menu-item">-->
                                    <!--    <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/issue_refund')?>">-->
                                    <!--        <span class="sidebar-menu-text">Issue Refunds</span>-->
                                    <!--    </a>-->
                                    <!--</li>-->
                                    
                                </ul>
                            </li>
                        </ul>

                        <div class="sidebar-heading">Evaluation</div>
                        <ul class="sidebar-menu sm-active-button-bg">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/files/index')?>">
                                    Review Answer Papers
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/ResponseController/students_response')?>">
                                    Response
                                </a>
                            </li>
                        </ul>

                        <div class="sidebar-heading">Student Administration</div>
                        <ul class="sidebar-menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button sidebar-js-collapse" data-toggle="collapse" href="#student">Student Management 
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu sm-indent collapse" id="student">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/student_management/add_approve');?>">
                                            <span class="sidebar-menu-text">Add/Approve </span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/student_management/activate_deactivate');?>">
                                            <span class="sidebar-menu-text">Activate/De-active </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button sidebar-js-collapse" data-toggle="collapse" href="#fees">Finance
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu sm-indent collapse" id="fees">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/payment_history/index');?>">
                                            <span class="sidebar-menu-text">Payment History</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button " href="<?php echo base_url('admin_controller/admin_dashboard/review_activity');?>">
                                    Review Activity
                                </a>
                            </li>

                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button " href="<?php echo base_url('admin_controller/admin_dashboard/student_information');?>">
                                    Student Information
                                </a>
                            </li>

                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button " href="<?php echo base_url('admin_controller/admin_dashboard/message_board');?>">
                                    Notification
                                </a>
                            </li>
                        </ul>
                        <div class="sidebar-heading">Examination</div>
                        <ul class="sidebar-menu sm-active-button-bg">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/examination/view_quiz')?>">
                                   MCQ
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/examination/index')?>">
                                   Unit Test Paper
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/examination/historicalquestionanswer')?>">Historical Q & A</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/examination/strategy')?>">
                                   Strategy
                                </a>
                            </li>
                        </ul>
                        <div class="sidebar-heading">Topper's Corner</div>
                        <ul class="sidebar-menu sm-active-button-bg">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/upload_videos')?>">
                                    Upload Videos
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/answer_copy')?>">
                                    Upload Answer Copy
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/toppers_picture')?>">
                                   Upload Topper's Picture
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('admin_controller/admin_dashboard/GalleryImages')?>">
                                   Upload Gallery Images
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    
        