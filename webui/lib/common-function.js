var now_item = document.getElementById("system-overview");

function collapse_nav_cate(id)
{
	var obj = document.getElementById("cate-" + id);
	var caller = document.getElementById("label-" + id);

	if (obj.style.display == "none") {
		obj.style.display = "block";
	} else {
		obj.style.display = "none";
	}

	if (caller.className == "nav-label folded") {
		caller.className = "nav-label unfolded";
	} else {
		caller.className = "nav-label folded";
	}
}

function goto_page(cid, iid)
{
	var item = document.getElementById(cid + "-" + iid);
	now_item.className = "nav-item not-at";
	item.className = "nav-item now-at";
	now_item = item;
}
