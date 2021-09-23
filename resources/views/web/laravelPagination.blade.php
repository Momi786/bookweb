
<ul class="pagination justify-content-center mt-3">
    @php 
      $pre = $curentCount-1;
      $next = $curentCount+1;
      $url = URL::to('all-book?page=') . $pre; 
      $url2 = URL::to('all-book?page=') . $next; 
    @endphp
  <li class="page-item"><a class="page-link" href="{{$curentCount == 1 ? '#' : $url}}">Previous</a></li>
  @for($i=1; $i <= $totalCount; $i++)
    @php $url1 = URL::to('all-book?page=') . $i; @endphp
    <li class="page-item"><a class="page-link" href="{{$curentCount == $i ? '#' : $url1}}">{{$i}}</a></li>
  @endfor
  <li class="page-item"><a class="page-link" href="{{$curentCount == $totalCount ? '#' : $url2}}">Next</a></li>
</ul>