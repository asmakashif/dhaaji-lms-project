<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="student-dashboard.html">Home</a></li>
                    <li class="breadcrumb-item active">Search Course</li>
                </ol>
                <h1 class="h2">Add Course</h1>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <div class="card-body">
                                    <form method="post" action="<?php echo base_url('student_controller/search_course/save_course');?>" id="form" class="form-horizontal">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Course Title</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="text" class="form-control" placeholder="Course Name" name="title" required/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="name">Course Description</label>
                                                    <div class="input-group input-group-merge">
                                                        <textarea class="form-control" name="description" placeholder="Product Detail" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Course Image</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="file" name="img"/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="name">Course Video</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="file" name="video"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button  type="submit" class="btn btn-primary col-md-2 col-md-offset-4">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('include/sidebar')?>