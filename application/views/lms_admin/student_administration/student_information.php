<!-- Header Layout Content -->
<div class="mdk-header-layout__content">
    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">
            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Student Information</li>
                </ol>
                <h1 class="h2">Student Information</h1>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><span style="color:red;">NOTE:</span>&nbsp;"The students whose Gaurdian Information is not filled, would not reflect here"</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th style="width: 18px;">Student ID</th>
                                                <th style="width: 160px;">Name</th>
                                                <th style="width: 50px;">School Name</th>
                                                <th style="width: 50px;">Standard</th>
                                                <th style="width: 70px;">Guardian Name</th>
                                                <th style="width: 50px;">Guardian Email</th>
                                                <th style="width: 15px;">Guardian Contact</th> 
                                                <th style="width: 24px;">Relation</th>
                                                <th style="width: 24px;">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list" id="search">
                                            <?php $count=1;
                                            foreach ($student_info as $key => $st) { ?>
                                                <tr class="selected">
                                                    <td><?php echo $st->id;?></td>
                                                    <td><?php echo $st->firstname;?></td>
                                                    <td><?php echo $st->school_name;?></td>
                                                    <td><?php echo $st->grade;?></td>
                                                    <td><?php echo $st->guardian_name;?></td>
                                                    <td><?php echo $st->email;?></td>
                                                    <td><?php echo $st->phone_number;?></td>
                                                    <td><?php echo $st->relation;?></td>
                                                    <?php if($st->status == 1){ ?>
                                                        <td>Subscribed</td>
                                                    <?php } else { ?>
                                                        <td>Payment Due</td>
                                                    <?php } ?>
                                                    <?php if($st->active == 0){ ?>
                                                        <td>Active</td>
                                                    <?php } else { ?>
                                                        <td>Inactive</td>
                                                    <?php } ?>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('include1/sidebar');?>
