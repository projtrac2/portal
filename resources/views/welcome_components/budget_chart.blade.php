<div class="row">
  <div class="col-xl-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body text-center">
          <p>All projects</p>
          <p id="total_prj" style="font-size: 30px; font-weight: bold;">0</p>
          <p id="total_prj_budget" style="font-size: 18px;">Budget 0</p>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-xl-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Projects Per SubCounty</h6>
        <div style="border: 1px solid black; padding: 10px;">
        {{-- table --}}
        <table class="table table-borderless" >
          <thead class="thead-dark" style="background: green;">
            <tr>
              <th scope="col" style="width: 10%; color: black;">#</th>
              <th scope="col" style="width: 30%; color: black;">Subcounty</th>
              <th scope="col" style="width: 30%; color: black;">No of projects</th>
              <th scope="col" style="width: 30%; color: black;">Total budgeted amount</th>
            </tr>
          </thead>
          <tbody id="prj-tbody">
           
            
          </tbody>
        </table>

        {{-- table --}}
        
        </div>
       
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-xl-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Projects Per Ward</h6>
        <div style="padding: 10px;">
        {{-- table --}}
        <div id="ward-div">

        </div>
        {{-- table --}}
        
        </div>
       
      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-xl-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Budget Allocation per Department</h6>
          <canvas id="chartjsBar"></canvas>
        </div>
      </div>
    </div>
</div>
<div class="row">
  <div class="col-xl-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Projects Distribution per Sub-County
        </h6>
        <canvas id="chartjsDoughnut"></canvas>
      </div>
    </div>
  </div>
  <div class="col-xl-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Budget allocated per financial year</h6>
        <canvas id="chartjsBar2"></canvas>
      </div>
    </div>
  </div>
</div>


