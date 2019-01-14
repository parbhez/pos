<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="{{URL::to('/home')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>	

						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Category</span><span class="label label-important"> 2</span></a>
							<ul>
								<li><a class="submenu" href="{{URL::to('/add-category')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Category</span></a></li>

								<li><a class="submenu" href="{{URL::tO('/all-category')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Category</span></a></li>
								
							</ul>	
						</li>

					<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Brand</span><span class="label label-important"> 2</span></a>
							<ul>
								<li><a class="submenu" href="{{URL::to('/add-brand')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Brand</span></a></li>

								<li><a class="submenu" href="{{URL::tO('/all-brand')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Brand</span></a></li>
								
							</ul>	
						</li>

						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Supplier</span><span class="label label-important"> 2</span></a>
							<ul>
								<li><a class="submenu" href="{{URL::to('/add-supplier')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Supplier</span></a></li>

								<li><a class="submenu" href="{{URL::tO('/all-supplier')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Supplier</span></a></li>
								
							</ul>	
						</li>


						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Item</span><span class="label label-important"> 2</span></a>
							<ul>
								<li><a class="submenu" href="{{URL::to('/add-item')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Item</span></a></li>

								<li><a class="submenu" href="{{URL::tO('/all-item')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Item</span></a></li>
								
							</ul>	
						</li>

					<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Search</span><span class="label label-important"> 2</span></a>
							<ul>
								<li class="{{ Request::is('invoiceSearch*') ? 'active': ''}}"><a class="submenu" href="{{URL::to('/invoiceSearch')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Sale Invoice</span></a></li>

								<li class="{{Request::is('PurchaseinvoiceSearch*') ? 'active': ''}}"><a class="submenu" href="{{URL::to('/PurchaseinvoiceSearch')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Purchase Invoice</span></a></li>
								
							</ul>	
						</li>

						<li><a href="{{URL::to('/addResult')}}"><i class="icon-eye-open"></i><span class="hidden-tablet"> Result</span></a></li>

						<li><a href="widgets.html"><i class="icon-dashboard"></i><span class="hidden-tablet"> Widgets</span></a></li>
						<li>

							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Dropdown</span><span class="label label-important"> 3 </span></a>
							<ul>
								<li><a class="submenu" href="submenu.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 1</span></a></li>
								<li><a class="submenu" href="submenu2.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 2</span></a></li>
								<li><a class="submenu" href="submenu3.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 3</span></a></li>
							</ul>	
						</li>
						<li><a href="form.html"><i class="icon-edit"></i><span class="hidden-tablet"> Forms</span></a></li>
						<li><a href="chart.html"><i class="icon-list-alt"></i><span class="hidden-tablet"> Charts</span></a></li>
						<li><a href="typography.html"><i class="icon-font"></i><span class="hidden-tablet"> Typography</span></a></li>
						<li><a href="gallery.html"><i class="icon-picture"></i><span class="hidden-tablet"> Gallery</span></a></li>
						<li><a href="table.html"><i class="icon-align-justify"></i><span class="hidden-tablet"> Tables</span></a></li>
						<li><a href="calendar.html"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span></a></li>
						<li><a href="file-manager.html"><i class="icon-folder-open"></i><span class="hidden-tablet"> File Manager</span></a></li>
						<li><a href="icon.html"><i class="icon-star"></i><span class="hidden-tablet"> Icons</span></a></li>
						<li><a href="login.html"><i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span></a></li>
					</ul>
				</div>