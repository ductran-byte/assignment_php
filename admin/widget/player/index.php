    
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="card">
                        <h4 class="title" style="color: white; margin-bottom: 20px;">Nhân vật</h4>
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php
                                        $result = fetch_row("SELECT COUNT(*) FROM `isNinja` WHERE `id` != '0'",1);
                                        if($result > 0) { $nv = $result; } else { $nv = 0; }
                                    ?>
                                    <p class="category">Tổng số nhân vật trên server: <b class="text-danger"><?= $nv; ?> nhân vật</b></p>
                                    <?php include('./error.php'); ?>
                                    <?php include('./success.php'); ?>
                                </div>   
                            </div>    
                        </div>

                        <div class="content">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Gender</th>
                                        <th class="text-center">Level</th>
                                        <th class="text-center">Exp</th>
                                        <th class="text-center">Chức năng</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql_get = "SELECT * FROM `isNinja`";
                                        foreach (fetch_assoc($sql_get, 0) as $key => $data){?>
                                        <tr>
                                            <td class="text-center"><?= $data["id"]; ?></td>
                                            <td class="text-center"><?= $data["name"]; ?></td>
                                            <td class="text-center">
                                                <?php if($data['gender'] == '0') {
                                                    echo'nữ';
                                                } else {
                                                    echo'nam';
                                                }?>  
                                            </td>
                                            <td class="text-center"><?= $data["level"]; ?></td>
                                            <td class="text-center"><?= number_format($data["exp"]); ?></td>
                                            <td class="text-center">
                                                <style>
                                                    .btn-right {color: white;margin-right: 5px;padding-left: 10px;padding-right: 10px;height: 30px;border-radius: 5px;font-weight: 600;}
                                                </style>
                                                <div style="display: flex;">
                                                    <a href="/admin/?widget=player_view&id=<?= $data['id']; ?>"><button class="btn-right btn-info">View</button></a>
                                                    <a href="/admin/?widget=player_edit&id=<?= $data['id']; ?>"><button class="btn-right btn-warning">Edit</button></a>
                                                </div>    
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

