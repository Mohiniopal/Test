
      
        
        <html>

        <head>

        <title>Contact Form</title>

        </head>

        <body>

        <table cellspacing='0px' style='width: auto; color: #333; border: 3px double #2957a4; padding: 20px;' align='center'>
 <tr align='center'>
<td colspan='2' style='border:none !important; padding-bottom:20px;padding-top:20px;'><img src="{{url('Admin/assets/img/LOGO_1.png')}}"  /></td>
 </tr>

 @if(isset($full_name))
<tr>
    <td align='left' bgColor='#fff' style='border:1px solid #ccc;padding:10px; font-family: Open Sans, sans-serif;font-size:16px;width:200px'><strong>Name:</strong></td>
    <td bgColor='#fff' style='border:1px solid #ccc;padding:10px; font-family: Open Sans, sans-serif;font-size:16px;width:250px'><?php echo $full_name ?></td>
</tr>
@endif

@if(isset($email))
 <tr>
    <td align='left' bgColor='#fff' style='border:1px solid #ccc;padding:10px; font-family: Open Sans, sans-serif;font-size:16px;width:200px'><strong>Email ID:</strong></td>
    <td bgColor='#fff' style='border:1px solid #ccc;padding:10px; font-family: Open Sans, sans-serif;font-size:16px;width:250px'><?php echo $email ?></td>
</tr>
@endif

@if(isset($phone_number))
 <tr>
<td align='left' bgColor='#f2f2f2' style='border:1px solid #ccc;padding:10px; font-family: Open Sans, sans-serif;font-size:16px;width:200px'><strong>Phone Number:</strong></td>
<td bgColor='#f2f2f2' style='border:1px solid #ccc;padding:10px; font-family: Open Sans, sans-serif;font-size:16px;'><?php echo $phone_number ?></td>
 </tr>
 @endif

 @if(isset($products))
 <tr>
    <td align='left' bgColor='#fff' style='border:1px solid #ccc;padding:10px; font-family: Open Sans, sans-serif;font-size:16px;width:200px'><strong>Products:</strong></td>
    <td bgColor='#fff' style='border:1px solid #ccc;padding:10px; font-family: Open Sans, sans-serif;font-size:16px;width:250px'><?php echo $products ?></td>
</tr>
@endif

 @if(isset($address))
 <tr>
<td align='left' bgColor='#f2f2f2' style='border:1px solid #ccc;padding:10px; font-family: Open Sans, sans-serif;font-size:16px;width:200px'><strong>Address:</strong></td>
<td bgColor='#f2f2f2' style='border:1px solid #ccc;padding:10px; font-family: Open Sans, sans-serif;font-size:16px;'><?php echo $address ?></td>
 </tr>
 @endif
 
 @if(isset($message_text))
 <tr>
<td align='left' bgColor='#f2f2f2' style='border:1px solid #ccc;padding:10px; font-family: Open Sans, sans-serif;font-size:16px;width:200px'><strong>Message / Requirements:</strong></td>
<td bgColor='#f2f2f2' style='border:1px solid #ccc;padding:10px; font-family: Open Sans, sans-serif;font-size:16px;'><?php echo $message_text ?></td>
 </tr>
 @endif
</table>
  </body>

        </html>

