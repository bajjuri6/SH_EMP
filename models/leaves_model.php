<?php

class Leaves_model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function leaves_apply() {
        if (empty($_POST['from'] || $_POST['to'])) {
            $err = -1;
            return $err;
        }
        
        $frmdt = strtotime($_POST['from']);
        $frmdt = date("Y-m-d", $frmdt);
        $todt = strtotime($_POST['to']);
        $todt = date("Y-m-d", $todt);
//        if ($todt <= $frmdt) {
//            $err = -2;
//            return $err;
//        }
        $sth5 = $this->db->prepare("INSERT INTO leaves(subject, fromdate, todate, description, email, apply_date, emp_name, emp_id) VALUES (:sub, :from, :to, :dec, :email, :date, :emp_name, :emp_id)");
        $insert = $sth5->execute(array(':sub' => str_replace("'", "\sq", $_POST['sub']),
            ':from' => strtotime($frmdt),
            ':to' => strtotime($todt),
            ':dec' => str_replace("'", "\sq", $_POST['dec']),
            ':date' => time(),
            ':email' => Session::get('loggedIn'),
            ':emp_id' => $_POST['emp_id'],
            ':emp_name' => $_POST['emp_name']));
        if ($insert == true) {
            $status = "Leave applied successfully";
            $mangermails = $this->db->prepare('SELECT emp_email FROM new_emp WHERE user_level = 2');
            $mangermails->execute();
            $result = $mangermails->fetchAll(PDO::FETCH_ASSOC);
            for ($i = 0; $i < sizeof($result); $i++) {
                if ($_SERVER['SERVER_NAME'] == 'employe.saddahaq.com') {
                    $to = $result[$i]['emp_email'];
                } else {
                    $to = 'mukkojusatish@gmail.com';
                }
                $from = "leaves@saddahaq.com";
                $emp_nme = $_POST['emp_name'];
                $subject = "New leave request from $emp_nme";
                $mail = '<html><body><table cellspacing = "0" cellpadding = "0" style = "padding:10px 10px;background:#eee;width:100%;font-family:arial"><tbody><tr><td><table align = "center" cellspacing = "0" style = "max-width:650px;min-width:320px"><tbody><tr><td style = "text-align:left;padding-bottom:14px"><img align = "left" style = "width: 200px;" alt = "Saddahaq" src = "https://tt.saddahaq.com/public/global/Images/lp_logo.png" class = "CToWUd"></td></tr><tr><td align = "center" style = "background:#fff;border:1px solid #e4e4e4;padding:50px 30px"><table align = "center"><tbody><tr><td style = "color:#666;text-align:left"><table align = "center" style = "margin:auto"><tbody><tr><td style = "text-align:center;padding-bottom:5px"><img align = "center" alt = "New leave mail icon" src = "https://ci5.googleusercontent.com/proxy/VVbSmOpDyK2G_1ro5Yo_ZippKVU6T5LnCRNiBl2O0aOdn9PU2kfBvSPvLTrGH3SEUn08vdL3jikojyfvV8-I22nClPkzHiN1nQXMCT_0FLlg1szAUKPTSsXVWgDa3lV5WuyedbRuF38=s0-d-e1-ft#http://d2nt7j7ljjsiah.cloudfront.net/assets/v2_emails/new_conversation_message.png" class = "CToWUd"></td></tr><tr><td style = "color:#005f84; font-size:16px;font-weight:bold;text-align:center;font-family:arial">NEW LEAVE</td></tr></tbody></table><p style = "font-size:16px;margin-bottom:0">Dear sir, </p><p style = "font-size:16px;margin-top:5px">' . $_POST["dec"] . '</p><table align = "center" style = "margin:auto;width:100%"><tbody><tr><td style = "color:#666;font-size:16px;padding-bottom:30px;text-align:left;font-family:arial"><div style = "font-style:italic;padding-bottom:15px;font-family:arial;line-height:20px;text-align:left"></div></td></tr></tbody></table><table align = "center" style = "margin:auto"><tbody><tr><td style = "background-color:white;border:1px solid #028a25;border-radius:3px;text-align:center"><a href = "' . LIVE . '" style = "padding:16px 20px;display:block;text-decoration:none;color:#333;font-size:16px;text-align:center;font-family:arial;font-weight:bold" target = "_blank">VIEW AND APPROVE</a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td></td></tr></tbody></table></body></html>';
                //$mail = $mail. $_POST["dec"];         
                //$headers  = "From: $from\r\n"; 
                $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
                mail($to, $subject, $mail, $headers);
            }
            
            $status_on = $this->db->prepare("UPDATE new_emp SET leaves_alert = 1");
            $status_on->execute();
            
                } else {
            $status = "Somthing went wrong while applying a Leave";
        }

        return $status;
    }

    public function approve() {
        if ($_POST['hr_status'] == "Approved") {
            $sth7 = $this->db->prepare("UPDATE leaves SET status = 1 WHERE id = :id");
            $update = $sth7->execute(array(':id' => $_POST['id']));
            $status = "You are approved a leave";
            if ($_SERVER['SERVER_NAME'] == 'employe.saddahaq.com') {
                $to = $_POST['email'];
            } else {
                $to = $_POST['email'];
            }
            $from = "leaves@saddahaq.com";
            $emp_nme = $_POST['emp_name'];
            $subject = "Your leave was approved";
            $mail = '<html><body><table cellspacing = "0" cellpadding = "0" style = "padding:10px 10px;background:#eee;width:100%;font-family:arial"><tbody><tr><td><table align = "center" cellspacing = "0" style = "max-width:650px;min-width:320px"><tbody><tr><td style = "text-align:left;padding-bottom:14px"><img align = "left" style = "width: 200px;" alt = "Saddahaq" src = "https://tt.saddahaq.com/public/global/Images/lp_logo.png" class = "CToWUd"></td></tr><tr><td align = "center" style = "background:#fff;border:1px solid #e4e4e4;padding:50px 30px"><table align = "center"><tbody><tr><td style = "color:#666;text-align:left"><table align = "center" style = "margin:auto"><tbody><tr><td style = "text-align:center;padding-bottom:5px"><img align = "center" alt = "New leave mail icon" src = "https://ci5.googleusercontent.com/proxy/VVbSmOpDyK2G_1ro5Yo_ZippKVU6T5LnCRNiBl2O0aOdn9PU2kfBvSPvLTrGH3SEUn08vdL3jikojyfvV8-I22nClPkzHiN1nQXMCT_0FLlg1szAUKPTSsXVWgDa3lV5WuyedbRuF38=s0-d-e1-ft#http://d2nt7j7ljjsiah.cloudfront.net/assets/v2_emails/new_conversation_message.png" class = "CToWUd"></td></tr><tr><td style = "color:#005f84; font-size:16px;font-weight:bold;text-align:center;font-family:arial">NEW LEAVE</td></tr></tbody></table><p style = "font-size:16px;margin-bottom:0">Dear sir, </p><p style = "font-size:16px;margin-top:5px">' . $_POST["dec"] . '</p><table align = "center" style = "margin:auto;width:100%"><tbody><tr><td style = "color:#666;font-size:16px;padding-bottom:30px;text-align:left;font-family:arial"><div style = "font-style:italic;padding-bottom:15px;font-family:arial;line-height:20px;text-align:left"></div></td></tr></tbody></table><table align = "center" style = "margin:auto"><tbody><tr><td style = "background-color:white;border:1px solid #028a25;border-radius:3px;text-align:center"><a href = "' . LIVE . '" style = "padding:16px 20px;display:block;text-decoration:none;color:#333;font-size:16px;text-align:center;font-family:arial;font-weight:bold" target = "_blank">VIEW</a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td></td></tr></tbody></table></body></html>';
            //$mail = $mail. $_POST["dec"];         
            //$headers  = "From: $from\r\n"; 
            $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
            mail($to, $subject, $mail, $headers);
        } else {
            if ($_POST['hr_status'] == "Rejected") {
                $sth7 = $this->db->prepare("UPDATE leaves SET status = 0 WHERE id = :id");
                $update = $sth7->execute(array(':id' => $_POST['id']));
                $status = "You are rejected a leave";

                $to = $_POST['email'];
                $from = "leaves@saddahaq.com";
                $emp_nme = $_POST['emp_name'];
                $subject = "Your leave was rejected by HR";
                $mail = '<html><body><table cellspacing = "0" cellpadding = "0" style = "padding:10px 10px;background:#eee;width:100%;font-family:arial"><tbody><tr><td><table align = "center" cellspacing = "0" style = "max-width:650px;min-width:320px"><tbody><tr><td style = "text-align:left;padding-bottom:14px"><img align = "left" style = "width: 200px;" alt = "Saddahaq" src = "https://tt.saddahaq.com/public/global/Images/lp_logo.png" class = "CToWUd"></td></tr><tr><td align = "center" style = "background:#fff;border:1px solid #e4e4e4;padding:50px 30px"><table align = "center"><tbody><tr><td style = "color:#666;text-align:left"><table align = "center" style = "margin:auto"><tbody><tr><td style = "text-align:center;padding-bottom:5px"><img align = "center" alt = "New leave mail icon" src = "https://ci5.googleusercontent.com/proxy/VVbSmOpDyK2G_1ro5Yo_ZippKVU6T5LnCRNiBl2O0aOdn9PU2kfBvSPvLTrGH3SEUn08vdL3jikojyfvV8-I22nClPkzHiN1nQXMCT_0FLlg1szAUKPTSsXVWgDa3lV5WuyedbRuF38=s0-d-e1-ft#http://d2nt7j7ljjsiah.cloudfront.net/assets/v2_emails/new_conversation_message.png" class = "CToWUd"></td></tr><tr><td style = "color:#005f84; font-size:16px;font-weight:bold;text-align:center;font-family:arial">NEW LEAVE</td></tr></tbody></table><p style = "font-size:16px;margin-bottom:0">Dear sir, </p><p style = "font-size:16px;margin-top:5px">' . $_POST["dec"] . '</p><table align = "center" style = "margin:auto;width:100%"><tbody><tr><td style = "color:#666;font-size:16px;padding-bottom:30px;text-align:left;font-family:arial"><div style = "font-style:italic;padding-bottom:15px;font-family:arial;line-height:20px;text-align:left"></div></td></tr></tbody></table><table align = "center" style = "margin:auto"><tbody><tr><td style = "background-color:white;border:1px solid #028a25;border-radius:3px;text-align:center"><a href = "' . LIVE . '" style = "padding:16px 20px;display:block;text-decoration:none;color:#333;font-size:16px;text-align:center;font-family:arial;font-weight:bold" target = "_blank">VIEW</a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td></td></tr></tbody></table></body></html>';
                //$mail = $mail. $_POST["dec"];         
                //$headers  = "From: $from\r\n"; 
                $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
                mail($to, $subject, $mail, $headers);
            }
        }


        return $status;
    }

    public function manger_status() {
        if ($_POST['mngr_status'] == 1 || $_POST['mngr_status'] == 0) {
            $aprve_time = $this->db->prepare("UPDATE leaves SET manager_aprve_tme = :manager_aprve_tme WHERE id = :id");
            $insert = $aprve_time->execute(array(':manager_aprve_tme' => time(), ':id' => $_POST['id']));
            $sth9 = $this->db->prepare("UPDATE leaves SET manager_status = :manager_status WHERE id = :id");
            $manager_status = $sth9->execute(array(':id' => $_POST['id'],
                ':manager_status' => $_POST['mngr_status']));
            $mngr_status = $_POST['mngr_status'];
            if ($manager_status == true) {
                if ($mngr_status == 1) {
                    $status = "Your approval confirm and it's forwarded to HR team";
                    $mangermails = $this->db->prepare('SELECT emp_email FROM new_emp WHERE user_level = 1');
                    $mangermails->execute();
                    $result = $mangermails->fetchAll(PDO::FETCH_ASSOC);
                    for ($i = 0; $i < sizeof($result); $i++) {
                        if ($_SERVER['SERVER_NAME'] == 'employe.saddahaq.com') {
                            $to = $result[$i]['emp_email'];
                        } else {
                            $to = 'mukkojusatish@gmail.com';
                        }
                        $from = "leaves@saddahaq.com";
                        $emp_nme = $_POST['emp_name'];
                        $subject = "Project manager forwarded a leave application of $emp_nme";
                        $mail = '<html><body><table cellspacing = "0" cellpadding = "0" style = "padding:10px 10px;background:#eee;width:100%;font-family:arial"><tbody><tr><td><table align = "center" cellspacing = "0" style = "max-width:650px;min-width:320px"><tbody><tr><td style = "text-align:left;padding-bottom:14px"><img align = "left" style = "width: 200px;" alt = "Saddahaq" src = "https://tt.saddahaq.com/public/global/Images/lp_logo.png" class = "CToWUd"></td></tr><tr><td align = "center" style = "background:#fff;border:1px solid #e4e4e4;padding:50px 30px"><table align = "center"><tbody><tr><td style = "color:#666;text-align:left"><table align = "center" style = "margin:auto"><tbody><tr><td style = "text-align:center;padding-bottom:5px"><img align = "center" alt = "New leave mail icon" src = "https://ci5.googleusercontent.com/proxy/VVbSmOpDyK2G_1ro5Yo_ZippKVU6T5LnCRNiBl2O0aOdn9PU2kfBvSPvLTrGH3SEUn08vdL3jikojyfvV8-I22nClPkzHiN1nQXMCT_0FLlg1szAUKPTSsXVWgDa3lV5WuyedbRuF38=s0-d-e1-ft#http://d2nt7j7ljjsiah.cloudfront.net/assets/v2_emails/new_conversation_message.png" class = "CToWUd"></td></tr><tr><td style = "color:#005f84; font-size:16px;font-weight:bold;text-align:center;font-family:arial">NEW LEAVE</td></tr></tbody></table><p style = "font-size:16px;margin-bottom:0">Dear sir, </p><p style = "font-size:16px;margin-top:5px">' . $_POST["dec"] . '</p><table align = "center" style = "margin:auto;width:100%"><tbody><tr><td style = "color:#666;font-size:16px;padding-bottom:30px;text-align:left;font-family:arial"><div style = "font-style:italic;padding-bottom:15px;font-family:arial;line-height:20px;text-align:left"></div></td></tr></tbody></table><table align = "center" style = "margin:auto"><tbody><tr><td style = "background-color:white;border:1px solid #028a25;border-radius:3px;text-align:center"><a href = "' . LIVE . '" style = "padding:16px 20px;display:block;text-decoration:none;color:#333;font-size:16px;text-align:center;font-family:arial;font-weight:bold" target = "_blank">VIEW AND APPROVE</a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td></td></tr></tbody></table></body></html>';
                        //$mail = $mail. $_POST["dec"];         
                        //$headers  = "From: $from\r\n"; 
                        $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        mail($to, $subject, $mail, $headers);
                    }
                    //return $status;
                }
                If ($mngr_status == 0) {
                    $status = "Your are Rejected the leave";

                    $to = $_POST['email'];
                    $from = "leaves@saddahaq.com";
                    $emp_nme = $_POST['emp_name'];
                    $subject = "Your leave was rejected by Manager";
                    $mail = '<html><body><table cellspacing = "0" cellpadding = "0" style = "padding:10px 10px;background:#eee;width:100%;font-family:arial"><tbody><tr><td><table align = "center" cellspacing = "0" style = "max-width:650px;min-width:320px"><tbody><tr><td style = "text-align:left;padding-bottom:14px"><img align = "left" style = "width: 200px;" alt = "Saddahaq" src = "https://tt.saddahaq.com/public/global/Images/lp_logo.png" class = "CToWUd"></td></tr><tr><td align = "center" style = "background:#fff;border:1px solid #e4e4e4;padding:50px 30px"><table align = "center"><tbody><tr><td style = "color:#666;text-align:left"><table align = "center" style = "margin:auto"><tbody><tr><td style = "text-align:center;padding-bottom:5px"><img align = "center" alt = "New leave mail icon" src = "https://ci5.googleusercontent.com/proxy/VVbSmOpDyK2G_1ro5Yo_ZippKVU6T5LnCRNiBl2O0aOdn9PU2kfBvSPvLTrGH3SEUn08vdL3jikojyfvV8-I22nClPkzHiN1nQXMCT_0FLlg1szAUKPTSsXVWgDa3lV5WuyedbRuF38=s0-d-e1-ft#http://d2nt7j7ljjsiah.cloudfront.net/assets/v2_emails/new_conversation_message.png" class = "CToWUd"></td></tr><tr><td style = "color:#005f84; font-size:16px;font-weight:bold;text-align:center;font-family:arial">NEW LEAVE</td></tr></tbody></table><p style = "font-size:16px;margin-bottom:0">Dear sir, </p><p style = "font-size:16px;margin-top:5px">' . $_POST["dec"] . '</p><table align = "center" style = "margin:auto;width:100%"><tbody><tr><td style = "color:#666;font-size:16px;padding-bottom:30px;text-align:left;font-family:arial"><div style = "font-style:italic;padding-bottom:15px;font-family:arial;line-height:20px;text-align:left"></div></td></tr></tbody></table><table align = "center" style = "margin:auto"><tbody><tr><td style = "background-color:white;border:1px solid #028a25;border-radius:3px;text-align:center"><a href = "' . LIVE . '" style = "padding:16px 20px;display:block;text-decoration:none;color:#333;font-size:16px;text-align:center;font-family:arial;font-weight:bold" target = "_blank">VIEW</a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td></td></tr></tbody></table></body></html>';
                    //$mail = $mail. $_POST["dec"];         
                    //$headers  = "From: $from\r\n"; 
                    $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
                    mail($to, $subject, $mail, $headers);
                }



                return $status;
            }
        } else {
            $status = "Something wrong while applying the leave";
            return $status;
        }
    }

}
