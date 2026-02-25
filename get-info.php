<?php
$id = $_POST['id'];
function getName($uid) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://napthe.vn/api/auth/player_id_login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode(["app_id" => 100067, "login_id" => $uid, "app_server_id" => 0]),
        CURLOPT_HTTPHEADER => array(
        'Accept-Language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
        'Connection: keep-alive',
        'Cookie: mspid2=b356a37fa139a09fb1719d8a88073122; _ga_VWDZYZV5E8=GS2.1.s1757343161$o3$g1$t1757343181$j40$l0$h0; region=VN; language=vi; _fbp=fb.1.1761303162631.22008687788122176; _ga=GA1.1.1829671702.1755597472; source=pc; _ga_5WZJDBPMCK=GS2.1.s1765102572$o4$g0$t1765102572$j60$l0$h0; datadome=sig0GuF5evEocPKA1puuxmjHYwaqe06k5cg8SGVM9dcLV~TmnlmP9TOnt8FOJDExV66abpBYEBwMrFLi_nTM~Ta51p_ws4g3I2cu4ydPUKu6xHFbg0M5UzelogSuT~tV; session_key=sq10dxbcsml178vk4l9ni82yzbciuauz',
        'Origin: https://napthe.vn',
        'Referer: https://napthe.vn/app',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Site: same-origin',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36',
        'accept: application/json',
        'content-type: application/json',
        'sec-ch-ua: "Not A(Brand";v="8", "Chromium";v="132", "Google Chrome";v="132"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"'
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $data = json_decode($response, true);
    if (isset($data['nickname'])) {
        return json_encode([
            "status" => "success",
            "name" => $data['nickname'],
            "uid" => $uid
        ], JSON_UNESCAPED_UNICODE);
    } else {
        return json_encode([
            "status" => "error",
            "message" => "Không tìm thấy nickname!"
        ], JSON_UNESCAPED_UNICODE);
    }
}
echo getName($id);