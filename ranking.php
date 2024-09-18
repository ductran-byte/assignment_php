<?php
include_once 'head.php'
?>
<div class="mb-2">
   <div class="row text-center justify-content-center row-cols-2 row-cols-lg-6 g-2 g-lg-2 mt-1">
      <div class="col">
         <div class="px-2">
         <a class="btn btn-menu btn-success w-100 fw-semibold false" href="/">Trang chủ</a>
        </div>
      </div>
      <div class="col">
         <div class="px-2">
         <a class="btn btn-menu btn-success w-100 fw-semibold false" href="nap-tien">Nạp tiền</a>
        </div>
      </div>
      <div class="col">
         <div class="px-2">
         <a class="btn btn-menu btn-success w-100 fw-semibold false" href="exchange">Đổi lượng</a>
        </div>
      </div>
      <div class="col">
          <a class="btn btn-menu btn-success w-100 fw-semibold false" href="<?php /** @var TYPE_NAME $lienket */
      echo $lienket ?>">Box Zalo</a>
        </div>
      </div>
   </div>

<div class="card">
                    <div class="card-body">
                        <ul class="mb-3 nav nav-tabs nav-justified" id="tabRanking" role="tablist">
                           <li class="nav-item" role="presentation"><button type="button" id="fill-tab-example-tab-1" role="tab" data-rr-ui-event-key="1" aria-controls="fill-tab-example-tabpane-1" aria-selected="false" class="nav-link active" data-bs-toggle="tab" data-bs-target="#fill-tab-example-tabpane-1">Thành viên</button></li>
                           <li class="nav-item" role="presentation"><button type="button" id="fill-tab-example-tab-2" role="tab" data-rr-ui-event-key="2" aria-controls="fill-tab-example-tabpane-2" aria-selected="false" class="nav-link" data-bs-toggle="tab" data-bs-target="#fill-tab-example-tabpane-2">Thành viên Bạc</button></li>
                           <li class="nav-item" role="presentation"><button type="button" id="fill-tab-example-tab-3" role="tab" data-rr-ui-event-key="3" aria-controls="fill-tab-example-tabpane-3" aria-selected="false" class="nav-link" data-bs-toggle="tab" data-bs-target="#fill-tab-example-tabpane-3">Thành viên Vàng</button></li>
                           <li class="nav-item" role="presentation"><button type="button" id="fill-tab-example-tab-4" role="tab" data-rr-ui-event-key="4" aria-controls="fill-tab-example-tabpane-4" aria-selected="true" class="nav-link" data-bs-toggle="tab" data-bs-target="#fill-tab-example-tabpane-4">Thành viên Kim Cương</button></li>
                        </ul>
                        <div class="tab-content" id="tabRankingContent"><div class="text-center"> Chưa cóa thông tin</div>
                          <!-- <div role="tabpanel" id="fill-tab-example-tabpane-1" aria-labelledby="fill-tab-example-tab-1" class="fade tab-pane active show">
                              <div class="d-inline d-sm-flex justify-content-center">
                                 <div class="col-md-8">
                                    <div class="list-group bg-warning">
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 100% khi nạp tiền trên 0đ.</small>
                                       </span>
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 102% khi nạp tiền trên 1,000,000đ.</small>
                                       </span>
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 103% khi nạp tiền trên 5,000,000đ.</small>
                                       </span>
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 105% khi nạp tiền trên 10,000,000đ.</small>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div role="tabpanel" id="fill-tab-example-tabpane-2" aria-labelledby="fill-tab-example-tab-2" class="fade tab-pane">
                              <div class="d-inline d-sm-flex justify-content-center">
                                 <div class="col-md-8">
                                    <div class="list-group bg-warning">
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Phần thưởng đạt hạng</span><small class="fw-semibold text-danger">HOT</small></div>
                                          <small>200tr yên, 5 bát bảo, 50 linh chi ngàn năm, 1 vé hoàn thành NV</small>
                                       </span>
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 100% khi nạp tiền trên 0đ.</small>
                                       </span>
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 102% khi nạp tiền trên 200,000đ.</small>
                                       </span>
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 104% khi nạp tiền trên 1,000,000đ.</small>
                                       </span>
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 105% khi nạp tiền trên 2,000,000đ.</small>
                                       </span>
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 107% khi nạp tiền trên 5,000,000đ.</small>
                                       </span>
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 110% khi nạp tiền trên 10,000,000đ.</small>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div role="tabpanel" id="fill-tab-example-tabpane-3" aria-labelledby="fill-tab-example-tab-3" class="fade tab-pane">
                              <div class="d-inline d-sm-flex justify-content-center">
                                 <div class="col-md-8">
                                    <div class="list-group bg-warning">
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Phần thưởng đạt hạng</span><small class="fw-semibold text-danger">HOT</small></div>
                                          <small>500tr yên, 1 Hakairo Yoroi, 5 rương bạch ngân, 50 linh chi ngàn năm, 2 vé hoàn thành NV</small>
                                       </span>
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 102% khi nạp tiền trên 0đ.</small>
                                       </span>
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 103% khi nạp tiền trên 200,000đ.</small>
                                       </span>
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 105% khi nạp tiền trên 1,000,000đ.</small>
                                       </span>
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 107% khi nạp tiền trên 2,000,000đ.</small>
                                       </span>
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 110% khi nạp tiền trên 5,000,000đ.</small>
                                       </span>
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 113% khi nạp tiền trên 10,000,000đ.</small>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div role="tabpanel" id="fill-tab-example-tabpane-4" aria-labelledby="fill-tab-example-tab-4" class="fade tab-pane">
                              <div class="d-inline d-sm-flex justify-content-center">
                                 <div class="col-md-8">
                                    <div class="list-group bg-warning">
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Phần thưởng đạt hạng</span><small class="fw-semibold text-danger">HOT</small></div>
                                          <small>1 tỷ yên, 1 Tôn Ngộ Không, 5 rương huyền bí, 5 vé hoàn thành NV</small>
                                       </span>
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 103% khi nạp tiền trên 0đ.</small>
                                       </span>
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 105% khi nạp tiền trên 200,000đ.</small>
                                       </span>
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 107% khi nạp tiền trên 1,000,000đ.</small>
                                       </span>
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 110% khi nạp tiền trên 2,000,000đ.</small>
                                       </span>
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 113% khi nạp tiền trên 5,000,000đ.</small>
                                       </span>
                                       <span class="list-group-item list-group-item-action">
                                          <div class="d-flex w-100 justify-content-between"><span class="fw-semibold">Khuyến mãi nạp tiền</span><small class="fw-semibold text-danger">new</small></div>
                                          <small>Ưu đãi 115% khi nạp tiền trên 10,000,000đ.</small>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                           </div>-->
                        </div>
                    </div>
                </div>
                    <div class="text-center my-2"><div class="age-rule"><img src="/images/12.png" alt="Age Rule" height="12">
                <span>Trò chơi dành cho người chơi 12 tuổi trở lên. Chơi quá 180 phút mỗi ngày sẽ có hại cho sức khỏe</span>
            </div>
        </div>    

    <script src="static/js/jquery.min.js"></script>
    <script src="static/js/popper.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
  </body>
</html>