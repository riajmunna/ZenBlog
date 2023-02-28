<aside class="sidebar-wrapper">
    <div class="iconmenu">
        <div class="nav-toggle-box">
            <div class="nav-toggle-icon"><i class="bi bi-list"></i></div>
        </div>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboards">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-dashboards" type="button"><i
                        class="bi bi-house-door-fill"></i></button>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Application">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-application" type="button"><i
                        class="bi bi-gear"></i></button>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="blog">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-blog" type="button"><i
                        class="bi bi-book-fill"></i></button>
            </li>
        </ul>
    </div>
    <div class="textmenu">
        <div class="brand-logo">
            <img src="{{asset('admin')}}/assets/images/brand-logo-2.png" width="140" alt=""/>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="pills-dashboards">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Dashboards</h5>
                        </div>
                        <small class="mb-0">Some placeholder content</small>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-application">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Settings</h5>
                        </div>
                        <small class="mb-0">Some placeholder content</small>
                    </div>
                    <a href="{{route('category')}}" class="list-group-item"><i class="bi bi-bookmark-check"></i>Category</a>
                    <a href="{{route('author')}}" class="list-group-item"><i class="bi bi-person"></i>Author</a>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-blog">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Blog</h5>
                        </div>
                        <small class="mb-0">Add here blogs...</small>
                    </div>
                    <a href="{{route('add.blog')}}" class="list-group-item"><i class="bi bi-plus-circle"></i>Add Blog</a>
                    <a href="{{route('manage.blog')}}" class="list-group-item"><i class="bi bi-view-list"></i>Manage Blog</a>
                </div>
            </div>
        </div>

    </div>
    </div>
</aside>
