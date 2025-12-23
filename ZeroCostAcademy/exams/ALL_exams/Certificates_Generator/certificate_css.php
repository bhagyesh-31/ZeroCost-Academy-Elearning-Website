<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit;
}
date_default_timezone_set("Asia/Kolkata"); // set your timezone
$currentDate = date("F j, Y");
$currentTime = date("h:i A");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Certificate of Completion</title>
  <link href="../img/icon.png" rel="icon" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <style>
    body {
      margin: 0;
      padding: 30px;
      background: linear-gradient(to right, #fdfcfb, #e2d1c3);
      font-family: 'Montserrat', sans-serif;
    }

    .certificate {
      width: 90%;
      max-width: 900px;
      margin: auto;
      border: 10px solid #ff7f0e;
      padding: 50px;
      background-color: white;
      box-shadow: 0 0 30px rgba(0,0,0,0.2);
      position: relative;
    }

    .academy-name {
      text-align: center;
      font-size: 32px;
      font-weight: bold;
      color: #333;
      margin-bottom: 10px;
      font-family: 'Montserrat', sans-serif;
    }

    h1 {
      text-align: center;
      font-size: 36px;
      color: #ff7f0e;
      margin-bottom: 10px;
    }

    h2 {
      text-align: center;
      font-weight: normal;
      font-size: 24px;
      margin: 5px 0;
    }

    .name {
      font-size: 28px;
      color: #333;
      font-family: 'Times New Roman', serif;
      font-weight: bold;
      text-align: center;
      margin: 30px 0 10px;
    }

    .course {
      text-align: center;
      font-size: 20px;
      margin-bottom: 40px;
      color: #555;
    }

    .course-name {
      font-weight: bold;
      color: #222;
    }

    .signatures {
      display: flex;
      justify-content: space-around;
      margin-top: 50px;
    }

    .sig {
      text-align: center;
    }

    .sig-name {
      font-family: 'Great Vibes', cursive;
      font-size: 30px;
      color: #000;
    }

    .sig-title {
      margin-top: 5px;
      font-size: 14px;
      color: #777;
      border-top: 1px solid #ccc;
      padding-top: 4px;
    }

    .details {
      text-align: center;
      margin-top: 20px;
      font-size: 16px;
      color: #555;
    }

    .stamp {
      position: absolute;
      bottom: 40px;
      right: 50px;
      width: 120px;
      height: 120px;
      border: 3px solid #ff7f0e;
      border-radius: 50%;
      text-align: center;
      line-height: 1.2;
      font-weight: bold;
      color: #ff7f0e;
      font-family: 'Montserrat', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      font-size: 16px;
      transform: rotate(-10deg);
    }

    .stamp span:first-child {
      font-size: 18px;
    }

    .stamp span:last-child {
      font-size: 16px;
    }

    .hidden {
      display: none;
    }

    button {
      font-size: 16px;
      padding: 10px;
      margin: 10px auto;
      width: calc(100% - 40px);
      max-width: 400px;
      display: block;
      background-color: #ff7f0e;
      color: white;
      border: none;
      cursor: pointer;
      font-weight: bold;
    }

    button:hover {
      background-color: #e76e00;
    }
  </style>
</head>
<body onload="generateCertificate()">

  <div class="certificate hidden" id="certificateSection">
    <div class="academy-name">ZeroCost Academy</div>
    <h1>Certificate of Completion</h1>
    <h2>This is to certify that</h2>
    <div class="name" id="certName">[Name]</div>
    <div class="course">
      has successfully completed the <span class="course-name">Frontend Development - CSS</span> course.
    </div>

    <div class="details">
      Date of Issue: <strong><?php echo $currentDate; ?></strong><br>
      Time of Issue: <strong><?php echo $currentTime; ?></strong>
    </div>

    <div class="signatures">
      <div class="sig">
        <div class="sig-name">Shrutik</div>
        <div class="sig-title">Co-Founder</div>
      </div>
      <div class="sig">
        <div class="sig-name">Shriram</div>
        <div class="sig-title">Founder</div>
      </div>
      <div class="sig">
        <div class="sig-name">Dnyaneshwar</div>
        <div class="sig-title">Developer</div>
      </div>
    </div>

    <div class="">
      
    </div>
  </div>

  <button id="downloadBtn" class="hidden" onclick="downloadCertificate()">Download Certificate</button>

  <script>
    const studentNameFromSession = "<?php echo $_SESSION['username']; ?>";

    function generateCertificate() {
      const name = studentNameFromSession.trim();

      if (name === "") {
        alert("Session expired. Please log in again.");
        return;
      }

      document.getElementById("certName").textContent = name;
      document.getElementById("certificateSection").classList.remove("hidden");
      document.getElementById("downloadBtn").classList.remove("hidden");
    }

    async function downloadCertificate() {
      const certificate = document.getElementById("certificateSection");

      const canvas = await html2canvas(certificate, {
        scale: 2
      });

      const imgData = canvas.toDataURL("image/png");
      const { jsPDF } = window.jspdf;
      const pdf = new jsPDF('landscape', 'pt', [canvas.width, canvas.height]);
      pdf.addImage(imgData, 'PNG', 0, 0, canvas.width, canvas.height);
      pdf.save("certificate.pdf");
    }
  </script>

</body>
</html>
