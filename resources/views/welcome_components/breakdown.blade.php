<div style="display: grid; grid-template-columns: 20% 80%">
    <div style="height: 120vh; background:#036">
        
    </div>
    <div class="p-2">
        <div class="card">
            <div class="card-body">
                <div>
                    <p>Project Name: Project one</p>
                    <div class="mt-2" style="display: grid; grid-template-columns: 1fr 1fr 1fr">
                        <p>Code: plamt45/34</p>
                        <p>Start Date: 01 Jul 2023</p>
                        <p>End Date: 04 Aug 2024</p>
                    </div>
                </div>
                <div class="mt-4">
                    <ul class="nav nav-tabs nav-tabs-line" id="lineTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-line-tab" data-bs-toggle="tab" data-bs-target="#home" role="tab" aria-controls="home" aria-selected="true">Timeline</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-line-tab" data-bs-toggle="tab" data-bs-target="#profile" role="tab" aria-controls="profile" aria-selected="false">Target Distribution</a>
                        </li>
                        
                      </ul>
                      <div class="tab-content mt-3" id="lineTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-line-tab">
                            <div class="row">
                                <div class="col-md-12 grid-margin stretch-card">
                                  <div class="card">
                                    <div class="card-body">
                                      <h6 class="card-title">Data Table</h6>
                                      <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>
                                      <div class="table-responsive">
                                        <table id="dataTableExample" class="table">
                                          <thead>
                                            <tr>
                                              <th>Name</th>
                                              <th>Position</th>
                                              <th>Office</th>
                                              <th>Age</th>
                                              <th>Start date</th>
                                              <th>Action</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>Tiger Nixon</td>
                                              <td>System Architect</td>
                                              <td>Edinburgh</td>
                                              <td>61</td>
                                              <td>2011/04/25</td>
                                              <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl">Extra large modal</button>
                                              </td>
                                            </tr>
                                            
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-line-tab">...</div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-xl" tabindex="-1" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Annually Targets
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead style="background:#036; ">
                      <tr>
                        <th style="color: white">#</th>
                        <th style="color: white">Year</th>
                        <th style="color: white">Target</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>2023/2024</td>
                        <td><input type="text" class="form-control" placeholder="Enter target"></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>2023/2024</td>
                        <td><input type="text" class="form-control" placeholder="Enter target"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Semi Annually Targets
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead style="background:#036; ">
                      <tr>
                        <th style="color: white">#</th>
                        <th style="color: white">Semi Annual</th>
                        <th style="color: white">Target</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>2023/2024</td>
                        <td><input type="text" class="form-control" placeholder="Enter target"></td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>2023/2024</td>
                        <td><input type="text" class="form-control" placeholder="Enter target"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Quarterly Targets
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead style="background:#036; ">
                      <tr>
                        <th style="color: white">#</th>
                        <th style="color: white">Quarter</th>
                        <th style="color: white">Target</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>2023/2024</td>
                        <td><input type="text" class="form-control" placeholder="Enter target"></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>2023/2024</td>
                        <td><input type="text" class="form-control" placeholder="Enter target"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Weekly Targets
              </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead style="background:#036; ">
                      <tr>
                        <th style="color: white">#</th>
                        <th style="color: white">Week</th>
                        <th style="color: white">Target</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>2023/2024</td>
                        <td><input type="text" class="form-control" placeholder="Enter target"></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>2023/2024</td>
                        <td><input type="text" class="form-control" placeholder="Enter target"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                Daily Targets
              </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead style="background:#036; ">
                      <tr>
                        <th style="color: white">#</th>
                        <th style="color: white">Day</th>
                        <th style="color: white">Target</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>2023/2024</td>
                        <td><input type="text" class="form-control" placeholder="Enter target"></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>2023/2024</td>
                        <td><input type="text" class="form-control" placeholder="Enter target"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>