<header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-left" href="/"><img src="{{ secure_asset("images/Nicologo.png") }}" alt="Nico"></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                    　　<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                Search
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <form method="get" action="{{route('shops.index')}}">
                                <input type="text" name="name" class="form-control" placeholder="keyword">
                                <input type="hidden" name="maction" value="search">
                                <input type="submit" value="Search" class="btn btn-secondery">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </form>
                                
                            </ul>
                            
                        </li>
                 <li class="dropdown">                            
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                            Category                                
                            <span class="caret"></span>                   
                    </a>
                    <ul class="dropdown-menu">
                               <li>
                                   <form method="get" action="{{route('shops.index')}}">
                                      <input type="hidden" name="maction" value="1">
                                      <input type="submit" value="Japanese" class="btn btn-link">
                                  </form>
                              </li>
                               <li> <form method="get" action="{{route('shops.index')}}">
                                      <input type="hidden" name="maction" value="2">
                                      <input type="submit" value="French" class="btn btn-link">
                                  </form>
                              </li>
                               <li><form method="get" action="{{route('shops.index')}}">
                                      <input type="hidden" name="maction" value="3">
                                      <input type="submit" value="Italian" class="btn btn-link">
                                  </form>
                              </li>
                               <li><form method="get" action="{{route('shops.index')}}">
                                      <input type="hidden" name="maction" value="4">
                                      <input type="submit" value="Chinese" class="btn btn-link">
                                  </form>
                              </li>
                               <li><form method="get" action="{{route('shops.index')}}">
                                      <input type="hidden" name="maction" value="5">
                                      <input type="submit" value="Korean" class="btn btn-link">
                                  </form>
                              </li>
                               <li><form method="get" action="{{route('shops.index')}}">
                                      <input type="hidden" name="maction" value="6">
                                      <input type="submit" value="Spanish" class="btn btn-link">
                                  </form>
                              </li>
                               <li><form method="get" action="{{route('shops.index')}}">
                                      <input type="hidden" name="maction" value="7">
                                      <input type="submit" value="Indian" class="btn btn-link">
                                  </form>
                              </li>
                               <li><form method="get" action="{{route('shops.index')}}">
                                      <input type="hidden" name="maction" value="8">
                                      <input type="submit" value="Ethnic" class="btn btn-link">
                                  </form>
                              </li>
                               <li><form method="get" action="{{route('shops.index')}}">
                                      <input type="hidden" name="maction" value="9">
                                      <input type="submit" value="Izakaya・Bar" class="btn btn-link">
                                  </form>
                              </li>
                               <li><form method="get" action="{{route('shops.index')}}">
                                      <input type="hidden" name="maction" value="10">
                                      <input type="submit" value=" Café" class="btn btn-link">
                                  </form>
                              </li>
                          </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
                                Ranking
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('ranking.favorite') }}">Favorite Ranking</a></li>
                                 <li><a href="{{ route('ranking.review') }}">Review Ranking</a></li>
                            </ul>
                        </li>
                        
                        <li class=dropdown-toggle>
                            <a href="{{ route('shops.create') }}">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                New Shop
                              </a>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="gravatar">
                                    <img src="{{ Gravatar::src(Auth::user()->email, 20) . '&d=mm' }}" alt="" class="img-circle">
                                </span>
                                {{ Auth::user()->name }}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('users.show', Auth::id()) }}">My Page</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('logout.get') }}">Log Out</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ route('signup.get') }}">Sign up</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>