<html>
   <head>
      <title></title>
      <style type="text/css">
         @media screen and (max-width: 480px) {
         table {
         width: 100% !important;
         }
         table td {
         font-size: 18px !important;
         }
         }
      </style>
   </head>
   <body style="background:#d7d7d7;text-align:center;margin:0;padding:0;font-family:sans-serif;">
      <center>
         <table cellspacing="0" cellpadding="0" border="0" width="100%" style="max-width:800px;">
            <tr>
               <td colspan="2" style="width:100%;height:230px;background:#2d2d2d;"><img src="{{ asset('img/venture_invite.jpg') }}" style="width:100%;"></td>
            </tr>
            <tr>
               <td colspan="2" style="background:#fff;padding:30px 40px;font-size:14px;line-height:30px;margin:0;border-bottom:solid 1px #d7d7d7;">
                  <center>
                     <p style="">
                        <div style="display:inline-block;color:#95989A;font-size:18px;font-weight:bold;text-transform:uppercase;letter-spacing:1px;">
                           {{ $request->name2 }} {{ $request->message }}
                        </div>
                        <div style="display:inline-block;color:#000;font-size:18px;font-weight:bold;text-transform:uppercase;letter-spacing:1px;">

                        </div>
                     </p>
                  </center>
               </td>
            </tr>
            <tr valign="top">
               <td style="background:#fff;padding: 30px 10px;font-size:14px;line-height:30px;margin:0;border-right:solid 1px #d7d7d7;width:50%;">
                  <center>
                     <p style="display:block;color:#1CBAE0;font-size:18px;font-weight:bold;text-transform:uppercase;letter-spacing:1px;"
                        >Where</p>
                     <p style="display:block;color:#95989A;line-height:30px;">

                        16845 HICKS ROAD <br>
                        LOS GATOS, CA 95032 <br>
                        408.997.4600
                     </p>
                  </center>
               </td>
               <td style="background:#fff;padding: 30px 10px;font-size:14px;line-height:30px;margin:0;width:50%;">
                  <center>
                     <p style="display:block;color:#1CBAE0;font-size:18px;font-weight:bold;text-transform:uppercase;letter-spacing:1px;">When</p>
                     <p style="display:block;color:#95989A;line-height:30px;text-transform:uppercase;">
                        {{ strtoupper($request->weekend) }} <br>
                        {{ $request->time }}
                     </p>
                  </center>
               </td>
            </tr>
            <tr>
               <td colspan="2" style="background:#444;padding:70px 0;font-size:24;line-height:30px;margin:0;">
                  <center>
                     <a href="{{ url('/') }}" style="display:block;color:#ffffff;font-size:24px;font-weight:bold;text-transform:uppercase;letter-spacing:1px;text-decoration:none;">
                     CONTINUE TO {{ str_replace('https://', 'www.', url('/')) }}
                     </a>
                  </center>
               </td>
            </tr>
         </table>
      </center>
   </body>
</html>