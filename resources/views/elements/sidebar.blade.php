<div class="col-md-3">
    <div class="popular-ques">
        <div class="ques-numbr">
            <h5>Question<span class="numb"><?= $sidebarTotalQuestions; ?></span></h5>
        </div>
        <div class="ques-numbr member">
            <h5>Member<span class="numb"><?= $sidebarTotalUsers; ?></span></h5>
        </div>
        <div class="popular-section">
            <h5>Popular Questions</h5>
            <ul>
                @if(!empty($topQuestions))
                @foreach($topQuestions as $ques)
                    <li><a href="{{ url('post/'.$ques->slug) }}"><?= $ques->title ?></a></li>
                @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>