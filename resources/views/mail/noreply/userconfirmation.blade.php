<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="format-detection" content="date=no" />
	<meta name="format-detection" content="address=no" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="x-apple-disable-message-reformatting" />
	<link href="https://fonts.googleapis.com/css?family=Cinzel:400,700,900|Roboto+Slab:300,400,700|Old+Standard+TT:400,400i,700" rel="stylesheet" />

	<title>Signage No Reply</title>
	<style type="text/css" media="screen">
		/* Linked Styles */
		body { padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#f4f4f4; -webkit-text-size-adjust:none }
		a { color:#e85853; text-decoration:none }
		p { padding:0 !important; margin:0 !important } 
		img { -ms-interpolation-mode: bicubic; /* Allow smoother rendering of resized image in Internet Explorer */ }
		.mcnPreviewText { display: none !important; }

				
		/* Mobile styles */
		@media only screen and (max-device-width: 480px), only screen and (max-width: 480px) {
			.mobile-shell { width: 100% !important; min-width: 100% !important; }

			.text-header,
			.m-center { text-align: center !important; }
			.holder { padding: 0 10px !important; }

			.text-nav { font-size: 10px !important; }

			.center { margin: 0 auto !important; }

			.td { width: 100% !important; min-width: 100% !important; }
			.td2 { width: 100% !important; min-width: 100% !important; padding: 10px !important; }

			.m-br-15 { height: 15px !important; }
			.bg { height: auto !important; } 

			.h0 { height: 0px !important; }

			.m-td,
			.m-hide { display: none !important; width: 0 !important; height: 0 !important; font-size: 0 !important; line-height: 0 !important; min-height: 0 !important; }

			.m-block { display: block !important; }

			.p30-15 { padding: 30px 15px !important; }
			.p15-15 { padding: 15px 15px !important; }
			.p30-0 { padding: 30px 0px !important; }
			.p0-15-30 { padding: 0px 15px 30px 15px !important; }
			.p0-15 { padding: 0px 15px 0px 15px !important; }
			.mp0 { padding: 0px !important; }
			.mp20-0-0 { padding: 20px 0px 0px 0px !important }
			.mp30 { padding-bottom: 30px !important; }
			.container { padding: 20px 0px !important; }
			.outer { padding: 0px !important }

			.fluid-img img { width: 100% !important; max-width: 100% !important; height: auto !important; }

			.column,
			.column-top,
			.column-dir,
			.column-empty,
			.column-empty2,
			.column-empty3,
			.column-bottom,
			.column-dir-top,
			.column-dir-bottom { float: left !important; width: 100% !important; display: block !important; }

			.column-empty { padding-bottom: 10px !important; }
			.column-empty2 { padding-bottom: 25px !important; }
			.column-empty3 { padding-bottom: 45px !important; }

			.content-spacing { width: 15px !important; }
			.content-spacing2 { width: 25px !important; }
		}
	</style>
</head>
<body class="body" style="padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#f4f4f4; -webkit-text-size-adjust:none;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f4f4f4">
		<tr>
			<td align="center" valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td align="center" class="outer" style="padding: 60px 0px;">
							<table width="650" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
								<tr>
									<td class="td2" bgcolor="#ffffff" style="width:610px; min-width:610px; font-size:0pt; line-height:0pt; padding:20px; margin:0; font-weight:normal;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td class="container" style="padding:27px; border:3px solid #d2c1a1;">													
													<!-- Hero -->
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td class="fluid-img" style="font-size:0pt; line-height:0pt; text-align:left;"><img src="https://cdn.techinasia.com/data/images/80721ec14531ed4281332ada8753b0f2.png" width="550" height="432" border="0" alt="" /></td>
														</tr>
														<tr>
															<td class="p30-15">
																<table width="100%" border="0" cellspacing="0" cellpadding="0">
																	@if($type=="register")
																	<tr>
																		<td class="h1 center pb30" style="color:#333333; font-family:'Cinzel', Georgia, serif; font-size:40px; line-height:46px; text-transform:uppercase; text-align:center; padding-bottom:30px;"><multiline>User Mail Confirmation</multiline></td>
																	</tr>
																	<tr>
																		<td class="text-center pb40 mp0" style="color:#666666; font-family:'Roboto Slab', Georgia, serif; font-size:16px; line-height:34px; text-align:center; font-weight:300; padding-bottom:40px;"><multiline>Hi {{$name}}, Please click the link below to continue your reqistration. <span class="m-hide"><br /></span><span class="m-hide"><br /></span>Generated Link : https://localhost:3000/#/login?code={{$code}}<br />The link will be expired after 2 hours.</multiline></td>
																	</tr>
																	@else
																	<tr>
																		<td class="h1 center pb30" style="color:#333333; font-family:'Cinzel', Georgia, serif; font-size:40px; line-height:46px; text-transform:uppercase; text-align:center; padding-bottom:30px;"><multiline>New Password Generated</multiline></td>
																	</tr>
																	<tr>
																		<td class="text-center pb40 mp0" style="color:#666666; font-family:'Roboto Slab', Georgia, serif; font-size:16px; line-height:34px; text-align:center; font-weight:300; padding-bottom:40px;"><multiline>Hi {{$name}}, Please click the link below to continue reset your password. <span class="m-hide"><br /></span><span class="m-hide"><br /></span>Generated Link : https://localhost:3000/#/login?resetcode={{$code}}<br />The link will be expired after 2 hours.</multiline></td>
																	</tr>
																	@endif
																</table>
															</td>
														</tr>
													</table>
													<!-- END Hero -->

													<!-- Article Image On The Right -->
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td class="p0-15-30" style="padding: 0px 0px 50px 0px;">
																<table width="100%" border="0" cellspacing="0" cellpadding="0" dir="rtl" style="direction: rtl;">
																	<tr>
																		<th class="column-dir" dir="ltr" width="270" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; direction:ltr;">
																			<table width="100%" border="0" cellspacing="0" cellpadding="0">
																				<tr>
																					<td class="fluid-img" style="font-size:0pt; line-height:0pt; text-align:left;"><img src="https://static7.depositphotos.com/1245125/745/v/600/depositphotos_7453664-stock-illustration-operator.jpg" width="270" height="389" border="0" alt="" /></td>
																				</tr>
																			</table>
																		</th>
																		<th class="column-empty" width="30" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;"></th>
																		<th class="column-dir-top" dir="ltr" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; direction:ltr; vertical-align:top;">
																			<table width="100%" border="0" cellspacing="0" cellpadding="0">
																				<tr>
																					<td class="mp20-0-0" style="padding: 20px;">
																						<table width="100%" border="0" cellspacing="0" cellpadding="0">
																							<tr>
																								<td class="h2 pb20" style="color:#333333; font-family:'Cinzel', Georgia, serif; font-size:30px; line-height:38px; text-align:left; padding-bottom:20px;"><multiline>Contact Us</multiline></td>
																							</tr>
																							<tr>
																								<td class="text pb30" style="color:#666666; font-family:'Roboto Slab', Georgia, serif; font-size:16px; line-height:30px; text-align:left; font-weight:300; padding-bottom:30px;"><multiline>Leadbook Singapore

<br /><br />Phone / Whatsapp : <br />+628123456789 <br /><br />Mail : <br />contact@leadbook.com
</multiline></td>
																							</tr>
																							<!-- Button -->
																							<tr>
																								<td align="left">
																									<table border="0" cellspacing="0" cellpadding="0">
																										<tr>
																											<td class="text-button" style="color:#666666; font-family:'Roboto Slab', Georgia, serif; font-size:13px; line-height:16px; text-align:center; padding:10px 20px; text-transform:uppercase; border:2px solid #d2c1a1;">
																												<multiline><a href="http://leadbook.com" target="_blank" class="link2" style="color:#666666; text-decoration:none;"><span class="link2" style="color:#666666; text-decoration:none;">FIND OUT MORE</span></a></multiline>
																											</td>
																										</tr>
																									</table>
																								</td>
																							</tr>
																							<!-- END Button -->
																						</table>
																					</td>
																				</tr>
																			</table>
																		</th>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
													<!-- END Article Image On The Right -->
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>
