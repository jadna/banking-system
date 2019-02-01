@extends('layouts.master')

@section('content')
<!-- page content -->
<div class="right_col" role="main">

    <br />
    <div class="">

        <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="count">Rp. {{ number_format($bal->value, 2) }}</div>

                    <h3>Balance Account</h3>
                </div>
            </div> 
        </div>

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Transfer <small>Report</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Account No</th>
                      <th>Receiver</th>
                      <th>Ammount</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($tf as $tf)
                    <tr>
                      <td>{{$tf->rekening}}</td>
                      <td>{{$tf->receiver}}</td>
                      <td>{{$tf->value}}</td>
                      <td>{{date('d F, Y', strtotime($tf->created_at))}}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Withdraw <small>Report</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Ammount</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($wt as $tf)
                    <tr>
                      <td>{{$tf->value}}</td>
                      <td>{{date('d F, Y', strtotime($tf->created_at))}}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Topup <small>Report</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Ammount</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($tp as $tf)
                    <tr>
                      <td>{{$tf->value}}</td>
                      <td>{{date('d F, Y', strtotime($tf->created_at))}}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
    </div>

    <!-- footer content -->
    <footer>
        <div class="copyright-info">
            <p class="pull-right">Laravel Banking System</a>
            </p>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->

</div>
<!-- /page content -->
@endsection

@section('extraScript')
  <script src="js/pace/pace.min.js"></script>
  <script>
    var handleDataTableButtons = function() {
        "use strict";
        0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
          dom: "Bfrtip",
          buttons: [{
            extend: "copy",
            className: "btn-sm"
          }, {
            extend: "csv",
            className: "btn-sm"
          }, {
            extend: "excel",
            className: "btn-sm"
          }, {
            extend: "pdf",
            className: "btn-sm"
          }, {
            extend: "print",
            className: "btn-sm"
          }],
          responsive: !0
        })
      },
      TableManageButtons = function() {
        "use strict";
        return {
          init: function() {
            handleDataTableButtons()
          }
        }
      }();
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#datatable').dataTable();
      $('#datatable-keytable').DataTable({
        keys: true
      });
      $('#datatable-responsive').DataTable();
      $('#datatable-scroller').DataTable({
        ajax: "js/datatables/json/scroller-demo.json",
        deferRender: true,
        scrollY: 380,
        scrollCollapse: true,
        scroller: true
      });
      var table = $('#datatable-fixed-header').DataTable({
        fixedHeader: true
      });
    });
    TableManageButtons.init();
  </script>
@endsection
