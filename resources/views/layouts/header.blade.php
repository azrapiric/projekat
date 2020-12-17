<div class="wrapper col0">
    <div id="topline">
        <ul>
            <li><a href="#">Libero</a></li>
            <li><a href="#">Maecenas</a></li>
            <li><a href="#">Mauris</a></li>
            <li class="last"><a href="#">Suspendisse</a></li>
        </ul>
        <div id="search">
            <form action="{{route('search')}}" method="post">
                @csrf
                <fieldset>
                    <legend>Site Search</legend>
                    <input type="text" placeholder="Search Our Website&hellip;" name="keyword" />
                    <input type="submit" name="go" id="go" value="Search" />
                </fieldset>
            </form>
        </div>
        <br class="clear" />
    </div>
</div>
