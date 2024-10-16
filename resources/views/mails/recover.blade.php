<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body style="background:#fff;">
	<br><br>


	<table align="center" style="background:white; width: 595px ; border: 2px solid #663399; border-radius:20px;">
		<tr>
			<td>
				<table width="595"  align="center" style="background:white; text-align:center; border-radius:20px;">
					<tr>
						<td><img moz-do-not-send="false" src="{{ env('APP_URL') }}/assets/newimages/Group%201.svg" alt="VivoQui" height="42"></td>

					</tr>
				</table>
				<table width="595"  cellpadding="20"  style="background:white;font-size:16px; color:#222; font-family: Calibri, arial, sans-serif !important; " >
					<tr>
						<td>To create a new password, please click on the following link:
							<br><br>

							<a href="{{ env('APP_URL') }}/new-password/{{$confirmation_code}}">{{ env('APP_URL') }}/new-password/{{$confirmation_code}}</a>

							<br><br>
							For any info please write to <a href="mailto:info@clickinvitation.com">info@clickinvitation.com</a>
							<br>
						</td>
					</tr>
					<tr>
						<td>Thank you</td>
					</tr>
				</table>


				<table width="100%"  cellpadding="20"  style="background:#663399; color:#fff; font-size:12px; font-family: Calibri, arial, sans-serif !important; text-align:center; border:none; border-bottom-left-radius:20px; border-bottom-right-radius:20px;  " >
					<tr>
						<td>
							<p> This is an automated message please do not reply.<br>
								clickinvitation.com <?php  echo date('Y'); ?>. All rights reserved.<br>
								<a style="color:white;"  href="mailto:info@clickinvitation.com">info@clickinvitation.com</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<a style="color:white;" href="{{ env('APP_URL') }}/privacy-policy">Privacy Policy</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<a style="color:white;" href="{{ env('APP_URL') }}/termos-of-use">Terms and Conditions</a>
							</p>
						</td>


					</tr>
				</table>
			</td>
		</tr>
	</table>



	<br>



</body>
</html>
