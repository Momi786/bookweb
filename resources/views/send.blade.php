@if(Session::has('desktopNotification'))
    @php
        function sendMessage() {            

            $data = Session::get('desktopNotification');

            $content = array(
                "en" => $data['message']
            );
            $headings = array(
                "en" => $data['title']
            );
            $fields = array(
                'app_id' => "e7a89dbf-b086-4970-b82f-19b35b6c1334",
                'included_segments' => array('All'),
                'contents' => $content,
                'headings' => $headings,
                'url' => $data['url'],
            );

            $fields = json_encode($fields);


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Authorization: Basic NDM1MmQyMWItZjA0NC00NTBiLTlkYzEtZWJiZGJlNGNjYTMz'
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

            $response = curl_exec($ch);
            curl_close($ch);

            return $response;
        }

        $response = sendMessage();
        $return["allresponses"] = $response;
        $return = json_encode($return);

    @endphp
    @php Session::pull('desktopNotification') @endphp
@endif
