<style type="text/css">
@media screen and (max-width : 1920px)
{
    #content-desktop {display: block;}
    #content-mobile {display: none;}
}
@media screen and (max-width : 906px)
{
    #content-desktop {display: none;}
    #content-mobile {display: block;}
}

</style>
<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
    <div class="mdk-drawer__content ">
        <div class="sidebar sidebar-left sidebar-dark bg-dark o-hidden" data-perfect-scrollbar>
            <div class="sidebar-p-y">
                <!-- <div class="sidebar-heading">APPLICATIONS</div> -->
                <ul class="sidebar-menu sm-active-button-bg">
                    <li class="sidebar-menu-item active">
                        <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/student_dashboard/index');?>">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_box</i>Hello <?php echo $this->session->userdata('email');?>
                        </a>
                    </li>
                </ul>
                <div style="display:none;">
                    <?php if(is_array($expired)){ foreach($expired as $row){ 
                        
                    ?>
                        <?php echo $row['id']; ?>
                        Payment Date <?php echo $date1 = date('d-m-Y',strtotime($row['payment_date'])); ?>
                        <br>
                        Expiry Date <?php echo $date2 = date('d-m-Y',strtotime($row['exp_date'])); ?>
                        <br>
                        <?php if(strtotime(date("d-m-Y")) < strtotime($date2)) echo "Active"; else { echo "Expired";} ?>
                    <?php } }else{ ?>
                    cdsg
                    <?php } ?>   
                </div>

            <?php if($this->session->userdata('plan_name') =='Full Course'){ ?>
                <?php if(strtotime(date("d-m-Y")) < strtotime($date2)) {  ?>
                    <div id="content-mobile">
                        <div class="sidebar-heading">Student</div>
                        <ul class="sidebar-menu sm-active-button-bg">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('shopping/index');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">import_contacts</i>Courses
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" onclick="expired()">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">class</i> Continue my Course
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/comment_controller/fetch_comment');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">chat_bubble_outline</i> Forum
                                </a>
                            </li>
                            <li class="sidebar-menu-item screen">
                                <a class="sidebar-menu-button" href="<?php echo base_url('user_controller/login');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">lock_open</i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php } else{ ?>
                    <div id="content-mobile">
                        <div class="sidebar-heading">Student</div>
                        <ul class="sidebar-menu sm-active-button-bg">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('shopping/index');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">import_contacts</i>Courses
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/student_dashboard/continue_course');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">class</i> Continue my Course
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/comment_controller/fetch_comment');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">chat_bubble_outline</i> Forum
                                </a>
                            </li>
                            <li class="sidebar-menu-item screen">
                                <a class="sidebar-menu-button" href="<?php echo base_url('user_controller/login');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">lock_open</i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
                <?php if(strtotime(date("d-m-Y")) < strtotime($date2)) {  ?>    
                    <div id="content-desktop">
                        <ul class="sidebar-menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button sidebar-js-collapse" data-toggle="collapse" href="#account_menu">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">person_outline</i>Account<span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu sm-indent collapse" id="account_menu">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/student_profile/my_profile');?>">
                                            <span class="sidebar-menu-text">My Profile</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/student_dashboard/my_acc_subscription');?>">
                                            <span class="sidebar-menu-text">My Subscription</span>
                                        </a>
                                    </li> 
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/student_profile/my_edu_info');?>">
                                            <span class="sidebar-menu-text">My Educational Information</span>
                                        </a>
                                    </li> 
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/student_dashboard/my_cart');?>">
                                            <span class="sidebar-menu-text">My Cart</span>
                                        </a>
                                    </li>     
                                </ul>
                            </li>
                        </ul>
                        <div class="sidebar-heading">Student</div>
                        <ul class="sidebar-menu sm-active-button-bg">
                        	<li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/search_course/index');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">search</i> Search Course
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('shopping/index');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">import_contacts</i>Courses
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/course/my_course');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">school</i>My Courses
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/student_dashboard/continue_course');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">class</i> Continue my Course
                                </a>
                            </li>
                            <!-- <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/student_dashboard/courseContinuation');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">class</i> Continue
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/course/contcourse');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">class</i> Continue
                                </a>
                            </li> -->
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/files/index');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i> Assessments
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/certificate/');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">poll</i> My Certifications
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/comment_controller/fetch_comment');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">chat_bubble_outline</i> Forum
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/student_dashboard/get_help');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">live_help</i> Get Help
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('welcome/index');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">lock_open</i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php } else{ ?>
                    <div id="content-desktop">
                        <ul class="sidebar-menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button sidebar-js-collapse" data-toggle="collapse" href="#account_menu">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">person_outline</i>Account<span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu sm-indent collapse" id="account_menu">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/student_profile/my_profile');?>">
                                            <span class="sidebar-menu-text">My Profile</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/student_dashboard/my_acc_subscription');?>">
                                            <span class="sidebar-menu-text">My Subscription</span>
                                        </a>
                                    </li> 
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/student_profile/my_edu_info');?>">
                                            <span class="sidebar-menu-text">My Educational Information</span>
                                        </a>
                                    </li> 
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/student_dashboard/my_cart');?>">
                                            <span class="sidebar-menu-text">My Cart</span>
                                        </a>
                                    </li>     
                                </ul>
                            </li>
                        </ul>
                        <div class="sidebar-heading">Student</div>
                        <ul class="sidebar-menu sm-active-button-bg">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/search_course/index');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">search</i> Search Course
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('shopping/index');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">import_contacts</i>Courses
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" onclick="expired()">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">school</i>My Courses
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" onclick="expired()">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">class</i> Continue my Course
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/files/index');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i> Assessments
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/certificate/');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">poll</i> My Certifications
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/comment_controller/fetch_comment');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">chat_bubble_outline</i> Forum
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/student_dashboard/get_help');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">live_help</i> Get Help
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="<?php echo base_url('welcome/index');?>">
                                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">lock_open</i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php }?>
            <?php } else{ ?>
                <?php if(strtotime(date("d-m-Y")) < strtotime($date2)) {  ?>
                    <div class="sidebar-heading">Student</div>
                    <ul class="sidebar-menu sm-active-button-bg">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="<?php echo base_url('shopping/index');?>">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i> Take Quiz
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/files/index');?>">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i> Assessments
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/certificate/');?>">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">poll</i> My Certifications
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/comment_controller/fetch_comment');?>">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">chat_bubble_outline</i> Forum
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/student_dashboard/get_help');?>">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">live_help</i> Get Help
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="<?php echo base_url('welcome/index');?>">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">lock_open</i> Logout
                            </a>
                        </li>
                    </ul>
                <?php } else { ?>
                    <div class="sidebar-heading">Student</div>
                    <ul class="sidebar-menu sm-active-button-bg">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="<?php echo base_url('shopping/index');?>">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i> Take Quiz
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" onclick="expired()">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i> Assessments
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" onclick="expired()">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">poll</i> My Certifications
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="<?php echo base_url('student_controller/comment_controller/fetch_comment');?>">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">chat_bubble_outline</i> Forum
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" onclick="expired()">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">live_help</i> Get Help
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="<?php echo base_url('welcome/index');?>">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">lock_open</i> Logout
                            </a>
                        </li>
                    </ul>
                <?php }?>
             <?php } ?>
                
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<script>
    function expired() 
    {
      alert("Your Subscription has expired");
    }
</script>