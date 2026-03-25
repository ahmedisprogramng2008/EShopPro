<?php
// إعدادات قاعدة البيانات
$host     = "localhost";     // السيرفر المحلي (غالباً ما يكون localhost)
$username = "root";          // اسم المستخدم الافتراضي في XAMPP هو root
$password = "";              // كلمة المرور الافتراضية في XAMPP تكون فارغة
$dbname   = "ecommerce_db";  // تأكد أن هذا هو نفس الاسم الذي أنشأته في phpMyAdmin

// إنشاء الاتصال باستخدام مكتبة mysqli
$conn = mysqli_connect($host, $username, $password, $dbname);

// التحقق من نجاح الاتصال
if (!$conn) {
    // في حالة الفشل، يتم إيقاف الموقع وإظهار رسالة خطأ تقنية
    die("<div style='color:red; text-align:center; padding:20px;'>
            <h2>خطأ في الاتصال بقاعدة البيانات!</h2>
            <p>" . mysqli_connect_error() . "</p>
         </div>");
}

// ضبط الترميز لدعم اللغة العربية بشكل صحيح
mysqli_set_charset($conn, "utf8mb4");



