@php
    $baseFare = Request::get('basefare') ?? 45;
    $distance = \Illuminate\Support\Facades\Request::get('distance');
    $time = Request::get('time');
    $charges = Request::get('charges');
    $total = $baseFare + $distance + $time + $charges;


    $pickupDate = \Carbon\Carbon::parse(Request::get('pickup_date'));
    $arrival = Carbon::parse(Request::get('arrival'));
    $diffInMinutes = $pickupDate->diffAsCarbonInterval($arrival);

@endphp
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "https://www.w3.org/TR/html4/strict.dtd">
<!-- saved from url=(0136)https://mail.google.com/mail/u/0/?ik=f04b06c1cd&view=pt&search=all&permthid=thread-f:1763115053482060564&simpl=msg-f:1763115053482060564 -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style type="text/css" nonce="">
        body,td,div,p,a,input {font-family: arial, sans-serif;}
    </style><meta http-equiv="X-UA-Compatible" content="IE=edge"><link rel="shortcut icon" href="https://ssl.gstatic.com/ui/v1/icons/mail/rfr/gmail.ico" type="image/x-icon"><title>Gmail - Your Grab E-Receipt</title><style type="text/css" nonce="">
        body, td {font-size:13px} a:link, a:active {color:#1155CC; text-decoration:none} a:hover {text-decoration:underline; cursor: pointer} a:visited{color:##6611CC} img{border:0px} pre { white-space: pre; white-space: -moz-pre-wrap; white-space: -o-pre-wrap; white-space: pre-wrap; word-wrap: break-word; max-width: 800px; overflow: auto;} .logo { left: -7px; position: relative; }
    </style></head><body><div class="bodycontainer"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tbody><tr height="14px"><td width="143"><img src="{{asset('grbc/logo_gmail_server_1x.png')}}" width="143" height="59" alt="Gmail" class="logo"></td><td align="right"><font size="-1" color="#777"><b>Gerald Jester Guance &lt;gguance221@gmail.com&gt;</b></font></td></tr></tbody></table><hr><div class="maincontent"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tbody><tr><td><font size="+1"><b>Your Grab E-Receipt</b></font><br><font size="-1" color="#777">1 message</font></td></tr></tbody></table><hr><table width="100%" cellpadding="0" cellspacing="0" border="0" class="message"><tbody><tr><td><font size="-1"><b>Grab </b>&lt;no-reply@grab.com&gt;</font></td><td align="right"><font size="-1">{{\Illuminate\Support\Carbon::parse(\Illuminate\Support\Facades\Request::get('arrival'))->format('D, M d, Y \a\t h:i A')}}</font></td></tr><tr><td colspan="2" style="padding-bottom: 4px;"><font size="-1" class="recipient"><div class="replyto">Reply-To: Grab &lt;no-reply@grab.com&gt;</div><div>To: gguance221@gmail.com</div></font></td></tr><tr><td colspan="2"><table width="100%" cellpadding="12" cellspacing="0" border="0"><tbody><tr><td><div style="overflow: hidden;"><font size="-1"><u></u>
                                        <div style="margin:0;padding:0;width:100%;word-break:break-word">
                                            <table class="m_-3428345954664179207wrapper m_-3428345954664179207all-font-sans" style="line-height:16px;font-size:16px" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                <tbody><tr>
                                                    <td>
                                                        <div class="m_-3428345954664179207sm-w-full" style="background-color:#fff;border-color:#f0efef;border-style:solid;border-width:1px;margin-left:auto;margin-right:auto;width:600px">
                                                            <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                <tbody><tr>
                                                                    <td class="m_-3428345954664179207sm-bg-right-bottom" style="background-image:url(https://ci6.googleusercontent.com/proxy/l88SxmjyFVJu56a0jKL8Wbb3Wslnx8RspG_pqjuxGPP7xhMibFupFzUl95_7-cSCLqDbQ5diggoBMq83MuCImt1x9kd89R8jILryMR3qrfRpZgO3J2NbYNg=s0-d-e1-ft#https://myteksi.s3-ap-southeast-1.amazonaws.com/gpns/email/img_bg3.png);background-position:bottom;background-repeat:no-repeat;background-size:600px auto;color:#fff" background="unnamed.png" bgcolor="#00b14f">
                                                                        <table style="color:#fff" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tbody><tr>
                                                                                <td align="left" class="m_-3428345954664179207sm-p-16" style="font-weight:600;padding:24px;color:#fff;font-size:18px;white-space:nowrap" width="1"><div style="white-space:nowrap">GrabCar 4-seater</div></td>
                                                                                <td align="right" class="m_-3428345954664179207sm-p-16" style="padding:24px" width="600">
                                                                                    <img alt="Grab" src="{{asset('grbc/unnamed(1).png')}}" style="border:0;line-height:100%;vertical-align:middle" width="48">
                                                                                </td>
                                                                            </tr>
                                                                            </tbody></table>
                                                                        <table style="color:#fff" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tbody><tr><td class="m_-3428345954664179207sm-h-16"></td></tr>
                                                                            <tr>
                                                                                <td align="left" valign="top" class="m_-3428345954664179207sm-w-full m_-3428345954664179207sm-block" width="312">
                                                                                    <div class="m_-3428345954664179207sm-px-16" style="padding-left:24px;padding-right:24px;padding-bottom:12px;color:#fff">
                                                                                        <div style="font-weight:600;line-height:38px;margin-bottom:8px;min-width:280px;color:#fff;font-size:32px">Hope you enjoyed your ride!</div>
                                                                                        <div style="font-weight:300;padding-bottom:40px;font-size:12px">
                                                                                            <div style="color:#fff">Picked up on {{\Illuminate\Support\Carbon::parse(\Illuminate\Support\Facades\Request::get('pickup_date'))->format('d F Y')}}</div>
                                                                                            <div style="color:#fff;white-space:nowrap">Booking ID: A-{{strtoupper(\Illuminate\Support\Str::random(12))}}</div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td align="right" valign="bottom" class="m_-3428345954664179207sm-w-full m_-3428345954664179207sm-block">
                                                                                    <div class="m_-3428345954664179207sm-pb-0 m_-3428345954664179207sm-text-center" style="padding-left:24px;padding-right:24px;padding-bottom:14px">
                                                                                        <img class="m_-3428345954664179207sm-w-full m_-3428345954664179207sm-max-w-312" src="{{asset('grbc/unnamed(2).png')}}" style="border:0;line-height:100%;vertical-align:middle;min-width:216px" width="216">
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody></table>
                                                                    </td>
                                                                </tr>
                                                                <tr><td height="24"></td></tr>
                                                                <tr>
                                                                    <td class="m_-3428345954664179207sm-px-16" style="padding-left:24px;padding-right:24px">
                                                                        <div style="padding-top:16px;padding-bottom:16px">
                                                                            <table style="font-weight:600" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                <tbody><tr>
                                                                                    <td align="left" style="color:#1c1c1c" width="100%">Total Paid</td>
                                                                                    <td align="right" class="m_-3428345954664179207sm-text-xl" style="padding-left:24px;color:#1c1c1c;font-size:32px;white-space:nowrap" width="1">
                                                                                        <div style="white-space:nowrap">P {{number_format($total,2)}}</div>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody></table>
                                                                        </div>
                                                                        <div style="border-color:#00b14f;border-style:solid;border-width:0;border-top-width:1px;padding-top:16px;color:#1c1c1c;font-size:12px">
                                                                            Thanks for riding with <span style="color:#00b14f">{{\Illuminate\Support\Facades\Request::get('driver')}}</span>.
                                                                        </div>
                                                                        <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tbody><tr>
                                                                                <td align="left" class="m_-3428345954664179207sm-w-full m_-3428345954664179207sm-block" style="padding-top:8px;padding-bottom:8px" width="100%">
                                                                                    <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                        <tbody><tr>
                                                                                            <td style="overflow:visible;padding-right:16px;font-size:0;white-space:nowrap" width="1">
                                                                                                <div style="display:inline-block;overflow:visible">
                                                                                                    <div style="background-image:url(&#39;https://ci3.googleusercontent.com/proxy/tnjjuommNqytiM96rBe9xK2Vzq5dK7omhv7_iQz36r0ZXJ7OdtYG_ZD6C9fqTAKblllguf3Sse3l_b1D49i_NazI02jGYu91llPcLccPUazayunIhhGWkG-X0w_IXJQKwS07TbWdGc2Qd66e=s0-d-e1-ft#https://daxexp.stg-myteksi.com/driver-profiles/static/images/compliments/cool_vehicle.png&#39;);background-color:#f7f7f7;background-position:top;background-size:cover;border-radius:9999px;display:inline-block;height:56px;width:56px"></div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td style="font-size:12px">
                                                                                                <div style="color:#1c1c1c">5.0 <img src="{{asset('grbc/unnamed(3).png')}}" alt="stars" style="border:0;line-height:100%;vertical-align:middle" width="12" height="12"></div>
                                                                                                <div style="color:#9a9a9a">Compliments for driver</div>
                                                                                                <div style="font-weight:600;color:#1c1c1c">Excellent Service</div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody></table>
                                                                        <div style="font-weight:600;padding-bottom:8px;padding-top:32px;color:#1c1c1c">
                                                                            Breakdown
                                                                        </div>
                                                                        <div style="border-color:#f0efef;border-style:solid;border-width:0;border-top-width:1px;padding-top:16px">
                                                                            <table style="line-height:24px;margin-top:12px" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                <tbody><tr>
                                                                                    <td align="left" valign="top" style="padding-bottom:24px;color:#1c1c1c" width="100%">
                                                                                        Base fare
                                                                                    </td>
                                                                                    <td align="right" valign="top" style="padding-bottom:24px;padding-left:24px;color:#1c1c1c;white-space:nowrap" width="1">
                                                                                        <div style="white-space:nowrap">
                                                                                            {{number_format($baseFare,2)}}
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left" valign="top" style="padding-bottom:24px;color:#1c1c1c" width="100%">
                                                                                        Distance
                                                                                    </td>
                                                                                    <td align="right" valign="top" style="padding-bottom:24px;padding-left:24px;color:#1c1c1c;white-space:nowrap" width="1">
                                                                                        <div style="white-space:nowrap">
                                                                                            {{number_format(\Illuminate\Support\Facades\Request::get('distance'),2)}}
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left" valign="top" style="padding-bottom:24px;color:#1c1c1c" width="100%">
                                                                                        Time
                                                                                    </td>
                                                                                    <td align="right" valign="top" style="padding-bottom:24px;padding-left:24px;color:#1c1c1c;white-space:nowrap" width="1">
                                                                                        <div style="white-space:nowrap">
                                                                                            {{number_format(Request::get('time'),2)}}
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left" valign="top" style="padding-bottom:24px;color:#1c1c1c" width="100%">
                                                                                        Surge charges
                                                                                    </td>
                                                                                    <td align="right" valign="top" style="padding-bottom:24px;padding-left:24px;color:#1c1c1c;white-space:nowrap" width="1">
                                                                                        <div style="white-space:nowrap">
                                                                                            {{number_format(Request::get('charges'),2)}}
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody></table>
                                                                        </div>
                                                                        <div style="border-color:#f0efef;border-style:solid;border-width:0;border-top-width:1px">
                                                                            <table style="margin-top:24px" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                <tbody><tr>
                                                                                    <td align="left" style="padding-bottom:24px;color:#1c1c1c" width="100%">Total Paid</td>
                                                                                    <td align="right" style="padding-bottom:24px;padding-left:24px;color:#1c1c1c;white-space:nowrap" width="1">
                                                                                        <div style="white-space:nowrap">{{number_format($total,2)}}</div>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody></table>
                                                                        </div>
                                                                        <table style="font-size:12px" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tbody><tr>
                                                                                <td align="left" valign="top" class="m_-3428345954664179207sm-pr-0 m_-3428345954664179207sm-w-full m_-3428345954664179207sm-block" style="padding-right:12px" width="50%">
                                                                                    <div style="margin-bottom:12px">
                                                                                        <div style="color:#9a9a9a">Passenger</div>
                                                                                        <div style="color:#1c1c1c">Gerald Jester Sy Guance</div>
                                                                                    </div>
                                                                                    <div style="margin-bottom:12px">
                                                                                        <div style="color:#9a9a9a">Profile</div>
                                                                                        <div style="color:#1c1c1c">Personal</div>
                                                                                    </div>
                                                                                </td>
                                                                                <td align="left" valign="top" class="m_-3428345954664179207sm-pl-0 m_-3428345954664179207sm-w-full m_-3428345954664179207sm-block m_-3428345954664179207sm-mt-16" style="padding-left:12px" width="50%">
                                                                                    <div style="color:#9a9a9a">
                                                                                        Paid by
                                                                                    </div>
                                                                                    <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                        <tbody><tr>
                                                                                            <td align="left" style="padding-top:4px;padding-right:8px;padding-bottom:12px;white-space:nowrap" width="24">
                                                                                                <img src="{{asset('grbc/unnamed(4).png')}}" alt="Cash" style="border:0;line-height:100%;vertical-align:middle" width="24">
                                                                                            </td>
                                                                                            <td align="left" style="padding-top:4px;padding-bottom:12px;color:#1c1c1c">
                                                                                                Cash
                                                                                            </td>
                                                                                            <td align="right" style="padding-top:4px;padding-bottom:12px;padding-left:24px;color:#1c1c1c;white-space:nowrap" width="1">
                                                                                                <div style="white-space:nowrap">{{number_format($total,2)}}</div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody></table>
                                                                        <div class="m_-3428345954664179207sm-pt-40" style="padding-top:24px">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" style="text-align:center;font-size:12px">
                                                                        <div class="m_-3428345954664179207sm-mx-16" style="border-color:#f0efef;border-style:solid;border-width:0;border-top-width:1px;margin-left:24px;margin-right:24px;padding-top:24px;padding-bottom:24px;color:#1c1c1c">
                                                                            Got an issue? We've got your back.
                                                                        </div>
                                                                        <table style="margin-bottom:16px;text-align:center;font-size:12px" width="100%" align="center" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tbody><tr>
                                                                                <td class="m_-3428345954664179207sm-inline-block m_-3428345954664179207sm-w-1-2" style="padding-bottom:24px" width="25%">
                                                                                    <a href="https://v2dc3pjr.r.us-east-1.awstrack.me/L0/https:%2F%2Fhelp.grab.com%2Fpassenger%2Fen-ph%3Faid=115005446908%26dl=1%26sid=1%26tid=A-4QCWHMHGWEJI%26ttype=transport/1/010001877d7cc9bf-45bde08d-b30e-4785-8f1c-ffba3f84dfec-000000/SaI9ywitIpC0w3uyv53-hfh_AFQ=317" style="display:inline-block;color:#1c1c1c;text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://v2dc3pjr.r.us-east-1.awstrack.me/L0/https:%252F%252Fhelp.grab.com%252Fpassenger%252Fen-ph%253Faid%3D115005446908%2526dl%3D1%2526sid%3D1%2526tid%3DA-4QCWHMHGWEJI%2526ttype%3Dtransport/1/010001877d7cc9bf-45bde08d-b30e-4785-8f1c-ffba3f84dfec-000000/SaI9ywitIpC0w3uyv53-hfh_AFQ%3D317&amp;source=gmail&amp;ust=1692801040079000&amp;usg=AOvVaw0uKPNLk64XcAvyLZD3dUIO">
                                                                                        <div>
                                                                                            <img alt="Lost Item" src="{{asset('grbc/unnamed(5).png')}}" style="border:0;line-height:100%;vertical-align:middle;display:block;margin:auto" height="40">
                                                                                        </div>
                                                                                        <div style="font-weight:600;margin-top:4px;padding-left:4px;padding-right:4px;color:#00a5cf">Lost Item</div>
                                                                                    </a>
                                                                                </td>
                                                                                <td class="m_-3428345954664179207sm-hidden" style="padding-bottom:24px" width="1">
                                                                                    <div style="border-color:#f0efef;border-style:solid;border-width:0;border-right-width:1px;height:20px"></div>
                                                                                </td>
                                                                                <td class="m_-3428345954664179207sm-inline-block m_-3428345954664179207sm-w-1-2" style="padding-bottom:24px" width="25%">
                                                                                    <a href="https://v2dc3pjr.r.us-east-1.awstrack.me/L0/https:%2F%2Fhelp.grab.com%2Fpassenger%2Fen-ph%3Faid=115005848568%26dl=1%26sid=1%26tid=A-4QCWHMHGWEJI%26ttype=transport/1/010001877d7cc9bf-45bde08d-b30e-4785-8f1c-ffba3f84dfec-000000/0YyHlxhm1O-EC8MGH6Es0u68Qiw=317" style="display:inline-block;color:#1c1c1c;text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://v2dc3pjr.r.us-east-1.awstrack.me/L0/https:%252F%252Fhelp.grab.com%252Fpassenger%252Fen-ph%253Faid%3D115005848568%2526dl%3D1%2526sid%3D1%2526tid%3DA-4QCWHMHGWEJI%2526ttype%3Dtransport/1/010001877d7cc9bf-45bde08d-b30e-4785-8f1c-ffba3f84dfec-000000/0YyHlxhm1O-EC8MGH6Es0u68Qiw%3D317&amp;source=gmail&amp;ust=1692801040080000&amp;usg=AOvVaw3i4803k7PduqgfpZBJ1FwS">
                                                                                        <div>
                                                                                            <img alt="Incorrect Trip" src="{{asset('grbc/unnamed(6).png')}}" style="border:0;line-height:100%;vertical-align:middle;display:block;margin:auto" height="40">
                                                                                        </div>
                                                                                        <div style="font-weight:600;margin-top:4px;padding-left:4px;padding-right:4px;color:#00a5cf">Incorrect Trip</div>
                                                                                    </a>
                                                                                </td>
                                                                                <td class="m_-3428345954664179207sm-hidden" style="padding-bottom:24px" width="1">
                                                                                    <div style="border-color:#f0efef;border-style:solid;border-width:0;border-right-width:1px;height:20px"></div>
                                                                                </td>
                                                                                <td class="m_-3428345954664179207sm-inline-block m_-3428345954664179207sm-w-1-2" style="padding-bottom:24px" width="25%">
                                                                                    <a href="https://v2dc3pjr.r.us-east-1.awstrack.me/L0/https:%2F%2Fhelp.grab.com%2Fpassenger%2Fen-ph%3Faid=115005848608%26dl=1%26sid=1%26tid=A-4QCWHMHGWEJI%26ttype=transport/1/010001877d7cc9bf-45bde08d-b30e-4785-8f1c-ffba3f84dfec-000000/qgQgwLXqAY5ui5B09JW4fdIOYac=317" style="display:inline-block;color:#1c1c1c;text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://v2dc3pjr.r.us-east-1.awstrack.me/L0/https:%252F%252Fhelp.grab.com%252Fpassenger%252Fen-ph%253Faid%3D115005848608%2526dl%3D1%2526sid%3D1%2526tid%3DA-4QCWHMHGWEJI%2526ttype%3Dtransport/1/010001877d7cc9bf-45bde08d-b30e-4785-8f1c-ffba3f84dfec-000000/qgQgwLXqAY5ui5B09JW4fdIOYac%3D317&amp;source=gmail&amp;ust=1692801040080000&amp;usg=AOvVaw0VH3iAw36HtsxcXDLCWmOL">
                                                                                        <div>
                                                                                            <img alt="Incorrect Fare" src="{{asset('grbc/unnamed(7).png')}}" style="border:0;line-height:100%;vertical-align:middle;display:block;margin:auto" height="40">
                                                                                        </div>
                                                                                        <div style="font-weight:600;margin-top:4px;padding-left:4px;padding-right:4px;color:#00a5cf">Incorrect Fare</div>
                                                                                    </a>
                                                                                </td>
                                                                                <td class="m_-3428345954664179207sm-hidden" style="padding-bottom:24px" width="1">
                                                                                    <div style="border-color:#f0efef;border-style:solid;border-width:0;border-right-width:1px;height:20px"></div>
                                                                                </td>
                                                                                <td class="m_-3428345954664179207sm-inline-block m_-3428345954664179207sm-w-1-2" style="padding-bottom:24px" width="25%">
                                                                                    <a href="https://v2dc3pjr.r.us-east-1.awstrack.me/L0/https:%2F%2Fhelp.grab.com%2Fpassenger%2Fen-ph%3Faid=%26dl=1%26sid=1%26tid=A-4QCWHMHGWEJI%26ttype=transport/1/010001877d7cc9bf-45bde08d-b30e-4785-8f1c-ffba3f84dfec-000000/T2nzbjCqdn8qs07IcmZuRWPeBew=317" style="display:inline-block;color:#1c1c1c;text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://v2dc3pjr.r.us-east-1.awstrack.me/L0/https:%252F%252Fhelp.grab.com%252Fpassenger%252Fen-ph%253Faid%3D%2526dl%3D1%2526sid%3D1%2526tid%3DA-4QCWHMHGWEJI%2526ttype%3Dtransport/1/010001877d7cc9bf-45bde08d-b30e-4785-8f1c-ffba3f84dfec-000000/T2nzbjCqdn8qs07IcmZuRWPeBew%3D317&amp;source=gmail&amp;ust=1692801040080000&amp;usg=AOvVaw0u2npx0C-sVD9uzJlnmHiL">
                                                                                        <div>
                                                                                            <img alt="Get Support" src="{{asset('grbc/unnamed(8).png')}}" style="border:0;line-height:100%;vertical-align:middle;display:block;margin:auto" height="40">
                                                                                        </div>
                                                                                        <div style="font-weight:600;margin-top:4px;padding-left:4px;padding-right:4px;color:#00a5cf">Get Support</div>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody></table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="m_-3428345954664179207sm-px-16" style="padding-top:16px;padding-bottom:16px;padding-left:24px;padding-right:24px" bgcolor="#f7f7f7">
                                                                        <div style="border-color:#f0efef;border-style:solid;border-width:0;border-bottom-width:1px;padding-bottom:8px">
                                                                            <div style="font-weight:600;line-height:24px;color:#1c1c1c">Your Trip</div>
                                                                            <div style="color:#1c1c1c;font-size:12px">{{Request::get('trip_distance')}} km • {{str_replace('minutes','mins', $diffInMinutes)}}</div>

                                                                        </div>
                                                                        <table style="margin-top:16px" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tbody><tr>
                                                                                <td valign="top" class="m_-3428345954664179207sm-block m_-3428345954664179207sm-w-full m_-3428345954664179207sm-pt-16">
                                                                                    <table style="margin-bottom:24px" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                                        <tbody><tr>
                                                                                            <td valign="top" align="center" style="overflow:hidden" width="32">
                                                                                                <img alt="pick-up" src="{{asset('grbc/unnamed(9).png')}}" style="border:0;line-height:100%;vertical-align:middle;display:block" height="24">
                                                                                                <div style="line-height:24px;max-height:28px;overflow:visible;color:#c5c5c5;font-size:32px">
                                                                                                    <div style="padding-top:2px;padding-bottom:2px">⋮</div>
                                                                                                    <div style="padding-top:2px;padding-bottom:2px">⋮</div>
                                                                                                    <div style="padding-top:2px;padding-bottom:2px">⋮</div>
                                                                                                    <div style="padding-top:2px;padding-bottom:2px">⋮</div>
                                                                                                    <div style="padding-top:2px;padding-bottom:2px">⋮</div>
                                                                                                    <div style="padding-top:2px;padding-bottom:2px">⋮</div>
                                                                                                    <div style="padding-top:2px;padding-bottom:2px">⋮</div>
                                                                                                    <div style="padding-top:2px;padding-bottom:2px">⋮</div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td valign="top" style="padding-left:4px">
                                                                                                <div style="line-height:24px;color:#1c1c1c">
                                                                                                    {{Request::get('pickup')}}
                                                                                                </div>
                                                                                                <div style="font-weight:300;margin-bottom:12px;color:#676767;font-size:12px">
                                                                                                    {{Carbon::parse(Request::get('pickup_date'))->format('h:iA')}}</div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td valign="top" align="center" width="32">
                                                                                                <img alt="drop-off" src="{{asset('grbc/unnamed(10).png')}}" style="border:0;line-height:100%;vertical-align:middle;display:block" height="24">
                                                                                            </td>
                                                                                            <td valign="top" style="padding-left:4px">
                                                                                                <div style="line-height:24px;color:#1c1c1c">
                                                                                                    {{Request::get('dropoff')}}
                                                                                                </div>
                                                                                                <div style="font-weight:300;color:#676767;font-size:12px">
                                                                                                    {{\Illuminate\Support\Carbon::parse(Request::get('arrival'))->format('h:iA')}}</div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody></table>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody></table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="m_-3428345954664179207sm-px-16" style="font-weight:300;padding-top:24px;padding-bottom:24px;padding-left:24px;padding-right:24px;color:#fff;font-size:12px" bgcolor="#1c1c1c">
                                                                        <table style="font-weight:300;margin-bottom:40px;color:#fff;font-size:12px" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                                            <tbody><tr>
                                                                                <td width="50%">
                                                                                    <div style="margin-bottom:16px">
                                                                                        <img alt="Grab" src="{{asset('grbc/unnamed(11).png')}}" style="border:0;line-height:100%;vertical-align:middle" width="60">
                                                                                    </div>
                                                                                </td>
                                                                                <td style="padding-left:32px" width="50%">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="m_-3428345954664179207sm-block m_-3428345954664179207sm-w-full" width="50%">
                                                                                    <div style="margin-bottom:2px;color:#fff">
                                                                                        Grab HQ <br>
                                                                                        3 Media Close, <br>
                                                                                        Singapore 138498
                                                                                    </div>
                                                                                </td>
                                                                                <td class="m_-3428345954664179207sm-block m_-3428345954664179207sm-w-full m_-3428345954664179207sm-mt-24 m_-3428345954664179207sm-pl-0" style="padding-left:52px" width="50%">
                                                                                    <div style="color:#fff">Follow us</div>
                                                                                    <div style="margin-top:8px;font-size:0;white-space:nowrap">
                                                                                        <a href="https://v2dc3pjr.r.us-east-1.awstrack.me/L0/https:%2F%2Fwww.facebook.com%2FGrab/1/010001877d7cc9bf-45bde08d-b30e-4785-8f1c-ffba3f84dfec-000000/u08VFBt_VRz5LmJcztEW8xavSxc=317" style="display:inline-block;margin-right:8px" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://v2dc3pjr.r.us-east-1.awstrack.me/L0/https:%252F%252Fwww.facebook.com%252FGrab/1/010001877d7cc9bf-45bde08d-b30e-4785-8f1c-ffba3f84dfec-000000/u08VFBt_VRz5LmJcztEW8xavSxc%3D317&amp;source=gmail&amp;ust=1692801040080000&amp;usg=AOvVaw19E02IqTBQto2pK-ggBJCl">
                                                                                            <img alt="facebook" src="{{asset('grbc/unnamed(12).png')}}" style="border:0;line-height:100%;vertical-align:middle" width="40" height="40">
                                                                                        </a>
                                                                                        <a href="https://v2dc3pjr.r.us-east-1.awstrack.me/L0/https:%2F%2Ftwitter.com%2FGrabSG/1/010001877d7cc9bf-45bde08d-b30e-4785-8f1c-ffba3f84dfec-000000/rp7Rfb5f4FaIdLRMNAyXAkcbqEk=317" style="display:inline-block;margin-right:8px" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://v2dc3pjr.r.us-east-1.awstrack.me/L0/https:%252F%252Ftwitter.com%252FGrabSG/1/010001877d7cc9bf-45bde08d-b30e-4785-8f1c-ffba3f84dfec-000000/rp7Rfb5f4FaIdLRMNAyXAkcbqEk%3D317&amp;source=gmail&amp;ust=1692801040080000&amp;usg=AOvVaw2VWNfuGQE_oeOAaA2Z5Pz_">
                                                                                            <img alt="twitter" src="{{asset('grbc/unnamed(13).png')}}" style="border:0;line-height:100%;vertical-align:middle" width="40" height="40">
                                                                                        </a>
                                                                                        <a href="https://v2dc3pjr.r.us-east-1.awstrack.me/L0/https:%2F%2Finstagram.com%2FGrab_SG/1/010001877d7cc9bf-45bde08d-b30e-4785-8f1c-ffba3f84dfec-000000/hbuNhB_i0RyR9Pp7C3r4EbD2BsM=317" style="display:inline-block;margin-right:8px" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://v2dc3pjr.r.us-east-1.awstrack.me/L0/https:%252F%252Finstagram.com%252FGrab_SG/1/010001877d7cc9bf-45bde08d-b30e-4785-8f1c-ffba3f84dfec-000000/hbuNhB_i0RyR9Pp7C3r4EbD2BsM%3D317&amp;source=gmail&amp;ust=1692801040080000&amp;usg=AOvVaw2S1rBU3NxioySgQ7-uIq5E">
                                                                                            <img alt="instagram" src="{{asset('grbc/unnamed(14).png')}}" style="border:0;line-height:100%;vertical-align:middle" width="40" height="40">
                                                                                        </a>
                                                                                        <a href="https://v2dc3pjr.r.us-east-1.awstrack.me/L0/https:%2F%2Fwww.linkedin.com%2Fcompany%2Fgrabapp/1/010001877d7cc9bf-45bde08d-b30e-4785-8f1c-ffba3f84dfec-000000/8lzdedfggYH-WFu131sb5W_95ro=317" style="display:inline-block;margin-right:8px" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://v2dc3pjr.r.us-east-1.awstrack.me/L0/https:%252F%252Fwww.linkedin.com%252Fcompany%252Fgrabapp/1/010001877d7cc9bf-45bde08d-b30e-4785-8f1c-ffba3f84dfec-000000/8lzdedfggYH-WFu131sb5W_95ro%3D317&amp;source=gmail&amp;ust=1692801040080000&amp;usg=AOvVaw07NDK7HyPqLQZLui5Tuvqy">
                                                                                            <img alt="linkedin" src="{{asset('grbc/unnamed(15).png')}}" style="border:0;line-height:100%;vertical-align:middle" width="40" height="40">
                                                                                        </a>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody></table>
                                                                        <div style="border-color:#f0efef;border-style:solid;border-width:0;border-top-width:1px;margin-bottom:24px;opacity:.2"></div>
                                                                        <div style="text-align:center;color:#fff">© Grab {{\Illuminate\Support\Carbon::now()->format('Y')}}</div>
                                                                    </td>
                                                                </tr>
                                                                </tbody></table>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody></table>
                                            <img alt="" src="unnamed.gif" style="display:none;width:1px;height:1px">
                                        </div>
                                    </font></div></td></tr></tbody></table></td></tr></tbody></table></div></div><script type="text/javascript" nonce="">// <![CDATA[
    document.body.onload=function(){document.body.offsetHeight;window.print()};
    // ]]></script></body></html>