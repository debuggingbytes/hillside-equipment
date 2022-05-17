@component('mail::message')
<h1>Hillside Contact Request</h1>

<p>Hello, Hillside!<br>We've recently had a contact form request from our website with the following information.</p>


<div style="display: block; margin: 25px auto; box-shadow: 0px 3px 10px rgba(0,0,0,.3); padding: 10px; border-radius: 10px;">

  <p style="margin: 0;"><span style='min-width: 100px; display: inline-block; font-weight: 700;'>FULL NAME:</span> <span style="margin-left: 10px;">{{$fullName}}</span></p>

  <p style="margin: 0;"><span style='min-width: 100px; display: inline-block; font-weight: 700;'>PHONE:</span> <span style="margin-left: 10px;">{{$phone}}</span></p>

  <p style="margin: 0;"><span style='min-width: 100px; display: inline-block; font-weight: 700;'>EMAIL:</span> <span style="margin-left: 10px;">{{$email}}</span></p>
  <p style="margin: 0;"><span style='min-width: 100px; display: inline-block; font-weight: 700;'>MESSAGE:</span> <span style="display: block;">{{$fullName}}</span></p>

</div>



Thanks,<br>
HillsideEquipment.com
<span style="font-size: 12px; display: block; margin-top: 10px;">This email has been auto generated from the website <a href='https://www.hillsideequipment.com'>HillsideEquipment.com</a>, Replying to this email will result in a return to sender failure. </span>
@endcomponent
