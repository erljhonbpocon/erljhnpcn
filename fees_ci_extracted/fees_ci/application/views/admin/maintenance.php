<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'inc/head.php'; ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <?php include 'inc/navbar.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'inc/aside.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">MAINTENANCE MODE</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card card-primary card-outline">
              <div class="card-header bg-gradient-primary">
                <h3 class="card-title">
                  <i class="fas fa-tools"></i> Maintenance Mode Control
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Status Display -->
                <div class="row mb-4">
                  <div class="col-md-12">
                    <div id="statusDisplay" class="alert alert-info" style="display: none;">
                      <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div>
                          <h5 style="margin: 0;" id="statusTitle">LOADING...</h5>
                          <p style="margin: 5px 0 0 0;" id="statusDescription"></p>
                        </div>
                        <div style="font-size: 50px;" id="statusIcon"></div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Toggle Switch -->
                <div class="row mb-4">
                  <div class="col-md-12">
                    <div style="background: #f8f9fa; padding: 30px; border-radius: 10px; text-align: center;">
                      <label style="font-size: 16px; font-weight: 600; margin-bottom: 20px; display: block;">
                        <i class="fas fa-power-off"></i> Toggle Maintenance Mode
                      </label>
                      <div style="display: flex; align-items: center; justify-content: center; gap: 15px;">
                        <span style="font-weight: 500; color: #666;">OFF</span>
                        <label class="switch" style="display: inline-block; position: relative; width: 70px; height: 35px;">
                          <input type="checkbox" id="maintenanceToggle" style="opacity: 0; width: 0; height: 0;">
                          <span class="slider" style="
                            position: absolute;
                            cursor: pointer;
                            top: 0;
                            left: 0;
                            right: 0;
                            bottom: 0;
                            background-color: #ccc;
                            transition: 0.4s;
                            border-radius: 35px;
                          "></span>
                        </label>
                        <span style="font-weight: 500; color: #666;">ON</span>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Info Cards -->
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <div class="info-box bg-light-success">
                      <span class="info-box-icon bg-success">
                        <i class="fas fa-check-circle"></i>
                      </span>
                      <div class="info-box-content">
                        <span class="info-box-text font-weight-bold">Mode: OFF</span>
                        <span class="info-box-number" style="font-size: 13px; color: #28a745;">
                          System Running Normally
                        </span>
                        <p style="margin: 8px 0 0 0; font-size: 12px; color: #666;">
                          All users (Admin & Clients) can access the system
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <div class="info-box bg-light-danger">
                      <span class="info-box-icon bg-danger">
                        <i class="fas fa-lock"></i>
                      </span>
                      <div class="info-box-content">
                        <span class="info-box-text font-weight-bold">Mode: ON</span>
                        <span class="info-box-number" style="font-size: 13px; color: #dc3545;">
                          System Under Maintenance
                        </span>
                        <p style="margin: 8px 0 0 0; font-size: 12px; color: #666;">
                          Only Admin can access. Clients see maintenance page
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Status Message -->
                <div id="statusMessage" class="alert" style="display: none; margin-top: 20px; border-radius: 5px;"></div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php include 'inc/footer.php'; ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<?php include 'inc/rscript.php'; ?>

<style>
  .bg-light-success {
    background-color: #e8f5e9 !important;
    border: 2px solid #4caf50;
    border-radius: 8px;
  }

  .bg-light-danger {
    background-color: #ffebee !important;
    border: 2px solid #f44336;
    border-radius: 8px;
  }

  .info-box-icon {
    border-radius: 8px;
    font-size: 24px;
  }

  .switch input:checked + .slider {
    background-color: #28a745 !important;
  }

  .slider:before {
    content: "";
    position: absolute;
    height: 27px;
    width: 27px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    transition: 0.4s;
    border-radius: 50%;
  }

  input:checked + .slider:before {
    transform: translateX(35px);
  }

  .card-header.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    color: white;
  }

  .card-header.bg-gradient-primary .card-title {
    color: white;
  }
</style>

<script>
$(document).ready(function() {
    // Get current maintenance status
    function getMaintenanceStatus() {
        $.ajax({
            url: '<?php echo base_url(); ?>admin/get_maintenance_status',
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    var isOn = response.maintenance_mode == 1;
                    $('#maintenanceToggle').prop('checked', isOn);
                    updateStatusDisplay(isOn);
                }
            },
            error: function() {
                showMessage('error', 'Failed to load maintenance status');
            }
        });
    }

    // Update status display
    function updateStatusDisplay(isOn) {
        var statusDisplay = $('#statusDisplay');
        var statusTitle = $('#statusTitle');
        var statusDescription = $('#statusDescription');
        var statusIcon = $('#statusIcon');

        if (isOn) {
            statusDisplay.removeClass('alert-success').addClass('alert-danger');
            statusTitle.text('MAINTENANCE MODE: ON');
            statusDescription.text('⚠️ Clients cannot access the system. Only Admin can access.');
            statusIcon.html('<i class="fas fa-exclamation-triangle" style="color: #dc3545;"></i>');
        } else {
            statusDisplay.removeClass('alert-danger').addClass('alert-success');
            statusTitle.text('MAINTENANCE MODE: OFF');
            statusDescription.text('✓ System is running normally. All users can access.');
            statusIcon.html('<i class="fas fa-check-circle" style="color: #28a745;"></i>');
        }
        statusDisplay.show();
    }

    // Show message
    function showMessage(type, message) {
        var messageDiv = $('#statusMessage');
        messageDiv.removeClass('alert-success alert-danger alert-warning');
        if (type === 'success') {
            messageDiv.addClass('alert-success');
        } else if (type === 'error') {
            messageDiv.addClass('alert-danger');
        } else {
            messageDiv.addClass('alert-warning');
        }
        messageDiv.html('<i class="fas fa-info-circle"></i> ' + message).show();
        
        setTimeout(function() {
            messageDiv.fadeOut();
        }, 4000);
    }

    // Toggle maintenance mode
    $('#maintenanceToggle').change(function() {
        var status = this.checked ? 1 : 0;
        var buttonText = status == 1 ? 'Enabling' : 'Disabling';
        
        $.ajax({
            url: '<?php echo base_url(); ?>admin/toggle_maintenance',
            type: 'POST',
            data: {
                status: status
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    updateStatusDisplay(status == 1);
                    showMessage('success', response.message);
                } else {
                    showMessage('error', response.message);
                    getMaintenanceStatus(); // Revert toggle
                }
            },
            error: function() {
                showMessage('error', 'Error toggling maintenance mode');
                getMaintenanceStatus(); // Revert toggle
            }
        });
    });

    // Load status on page load
    getMaintenanceStatus();
});
</script>
</body>
</html>
