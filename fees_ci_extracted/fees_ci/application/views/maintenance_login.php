<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Fees Tracker | Maintenance</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Source Sans Pro', sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }

    /* Animated background elements */
    .bg-shape {
      position: absolute;
      border-radius: 50%;
      opacity: 0.1;
    }

    .shape-1 {
      width: 300px;
      height: 300px;
      top: -50px;
      left: -50px;
      background: white;
      animation: float 6s ease-in-out infinite;
    }

    .shape-2 {
      width: 200px;
      height: 200px;
      bottom: -30px;
      right: -30px;
      background: white;
      animation: float 8s ease-in-out infinite reverse;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(20px); }
    }

    .maintenance-container {
      position: relative;
      z-index: 10;
      width: 100%;
      padding: 20px;
    }

    .maintenance-box {
      background: white;
      border-radius: 15px;
      padding: 50px 40px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
      text-align: center;
      max-width: 600px;
      margin: 0 auto;
      animation: slideUp 0.6s ease-out;
    }

    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .maintenance-icon {
      font-size: 100px;
      color: #667eea;
      margin-bottom: 30px;
      animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.05); }
    }

    .maintenance-title {
      font-size: 36px;
      font-weight: 700;
      color: #333;
      margin-bottom: 15px;
      letter-spacing: -0.5px;
    }

    .maintenance-subtitle {
      font-size: 18px;
      color: #667eea;
      margin-bottom: 30px;
      font-weight: 600;
    }

    .maintenance-message {
      font-size: 16px;
      color: #666;
      margin-bottom: 20px;
      line-height: 1.8;
      letter-spacing: 0.3px;
    }

    .maintenance-description {
      font-size: 14px;
      color: #999;
      line-height: 1.9;
      margin-bottom: 35px;
    }

    .maintenance-description p {
      margin-bottom: 12px;
    }

    .status-badge {
      display: inline-block;
      background: #fff3cd;
      color: #856404;
      padding: 10px 20px;
      border-radius: 50px;
      font-size: 13px;
      font-weight: 600;
      margin-bottom: 25px;
      border: 2px solid #ffc107;
    }

    .loader {
      width: 40px;
      height: 40px;
      margin: 20px auto;
      border: 4px solid #f3f3f3;
      border-top: 4px solid #667eea;
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .footer-text {
      margin-top: 40px;
      padding-top: 20px;
      border-top: 1px solid #eee;
      font-size: 12px;
      color: #999;
    }

    .footer-text a {
      color: #667eea;
      text-decoration: none;
    }

    .footer-text a:hover {
      text-decoration: underline;
    }

    /* Responsive */
    @media (max-width: 600px) {
      .maintenance-box {
        padding: 40px 25px;
      }

      .maintenance-title {
        font-size: 28px;
      }

      .maintenance-icon {
        font-size: 70px;
      }

      .shape-1, .shape-2 {
        display: none;
      }
    }
  </style>
</head>
<body>
  <!-- Background shapes -->
  <div class="bg-shape shape-1"></div>
  <div class="bg-shape shape-2"></div>

  <!-- Main Container -->
  <div class="maintenance-container">
    <div class="maintenance-box">
      <!-- Icon -->
      <div class="maintenance-icon">
        <i class="fas fa-tools"></i>
      </div>

      <!-- Status Badge -->
      <div class="status-badge">
        🔧 SYSTEM UNDER MAINTENANCE
      </div>

      <!-- Title -->
      <div class="maintenance-title">System Maintenance</div>
      <div class="maintenance-subtitle">We're Currently Updating</div>

      <!-- Message -->
      <div class="maintenance-message">
        We're performing important maintenance on the system to improve your experience and security.
      </div>

      <!-- Description -->
      <div class="maintenance-description">
        <p>We apologize for any inconvenience this may cause. The system will be back online shortly.</p>
        <p><strong>Expected Duration:</strong> A few minutes to an hour</p>
        <p>Thank you for your patience and understanding.</p>
      </div>

      <!-- Loader -->
      <div class="loader"></div>

      <!-- Auto-refresh info -->
      <div class="maintenance-description" style="margin-top: 20px; font-size: 12px; color: #bbb;">
        This page will automatically refresh every 30 seconds to check system status
      </div>

      <!-- Footer -->
      <div class="footer-text">
        Need help? Contact the system administrator
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="<?php echo base_url() ?>assets/backend/plugins/jquery/jquery.min.js"></script>
  <script>
    // Auto-refresh the page every 30 seconds to check if maintenance is over
    setInterval(function() {
      location.reload();
    }, 30000);

    // Optional: Add a manual refresh button functionality
    document.addEventListener('DOMContentLoaded', function() {
      // You can add additional functionality here if needed
    });
  </script>
</body>
</html>
