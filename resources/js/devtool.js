// Mencegah akses ke DevTools
let devToolsEnabled = false;

document.addEventListener("contextmenu", function (e) {
	if (!devToolsEnabled) {
		e.preventDefault();
	}
});

document.addEventListener("keydown", function (e) {
	if (e.key === "F12" || (e.ctrlKey && e.shiftKey && e.key === "I")) {
		if (!devToolsEnabled) {
			e.preventDefault();
		}
	}

	// Check for Ctrl+Shift+X to toggle dev tools
	if (e.ctrlKey && e.shiftKey && e.key === "X") {
		devToolsEnabled = !devToolsEnabled;
		console.log("Dev Tools " + (devToolsEnabled ? "enabled" : "disabled"));
	}
});
