<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
	<div class="container">
		<a class="navbar-brand" href="/">Roshit</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
			aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="navbar-collapse collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ Request::is('post') ? 'active' : '' }}" href="/post">Blog</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ Request::is('categories') ? 'active' : '' }}" href="/categories">Categories</a>
				</li>
			</ul>

			<ul class="navbar-nav ms-auto">
				@auth()
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Welcome back, {{ auth()->user()->username }}
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="/dashboard" target="_blank"><i class="bi bi-layout-text-window-reverse"></i> My Dashboard</a></li>
							<li><hr class="dropdown-divider"></li>
							<li>
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-left"></i> Logout</button>
                </form>
              </li>
						</ul>
					</li>
				@else
					<li class="nav-item">
						<a class="nav-link {{ Request::is('login') ? 'active' : '' }} d-inline-block" href="/login"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
							<path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
						  </svg><span class="d-inline-block align-middle ms-1">Login</span></a>
					</li>
				@endauth
			</ul>
		</div>
	</div>
</nav>
