
function toggleCartt(){
	document.querySelector('.sidebar').classList.toggle('open-cart');
	}
// add quantity product script
let quantityInput = document.getElementById('quantity');

function subtractQuantity() {
    let currentValue = parseInt(quantityInput.value);
    if (currentValue > 0) {
        quantityInput.value = currentValue - 1;
    }
}

function addQuantity() {
    let currentValue = parseInt(quantityInput.value);
    quantityInput.value = currentValue + 1;
}

document.addEventListener("DOMContentLoaded", function () {
	// Show the content of the first tab when the page loads
	showTab(0);
});

function showTab(tabIndex) {
	// Get all tab name elements
	const tabNames = document.querySelectorAll('.tab-name');

	// Remove the 'active' class from all tab names
	tabNames.forEach(tabName => {
			tabName.classList.remove('active');
	});

	// Add the 'active' class to the selected tab name
	tabNames[tabIndex].classList.add('active');

	// Get all tab content elements
	const tabContents = document.querySelectorAll('.tab-pane');

	// Hide all tab content
	tabContents.forEach(tabContent => {
			tabContent.classList.remove('active');
	});

	// Show the selected tab content
	tabContents[tabIndex].classList.add('active');
}
// image changing



function changeImage(newImage) {
	document.getElementById('main-image').src = newImage;

}

const toggleButton = document.getElementById('toggleButton');
const myElement = document.getElementById('myElement');

toggleButton.addEventListener('click', function () {
	if (myElement.style.display === 'block') {
		myElement.style.display = 'none';
	} else {
		myElement.style.display = 'block';
	}
});
