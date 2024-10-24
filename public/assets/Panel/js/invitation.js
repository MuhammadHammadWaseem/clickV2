var selectedText;
var interval = null;
var interval1 = null;
var copiedText;
var text;
var textSize = "12px";
var font_number = document.getElementById("font-size");
var textalign = document.getElementById("textalign");
var textalignleft = document.getElementById("textalign-left");
var textalignright = document.getElementById("textalign-right");
var trash = document.getElementById("trash");
var trash2 = document.getElementById("trash2");
var clone = document.getElementById("clone");
var export1 = document.getElementById("export");
var addsticker = document.getElementById("addsticker");
var sidebaraddtext = document.getElementById("sidebaraddtext");
var fontselector2 = document.getElementById("font-selector2");
var body1 = document.querySelector("body");
var colorpicker = document.querySelector("color-picker");
var sideshow = document.getElementsByClassName("sidebar")[0];
var body = document.getElementsByTagName("body")[0];
var topBar = document.getElementsByClassName("topBar")[0];
var sideimg = document.getElementsByClassName("sidebaraddimg")[0];
var sideimgbtn = document.getElementsByClassName("topbtns")[0];
var can = document.getElementById("canv");
const stickers = [];
var clonedText;
let canv;
let moveHistory = [];
let currentIndex = -1;
var canvasHistory = [];


var undoStack = [];
var redoStack = [];
var maxUndoStackSize = 10000000;


// window.addEventListener("load", () => {
setTimeout(() => {
  $(document).ready(function () {
    canv = new fabric.Canvas("canvas", {
      backgroundColor: "white",
      width: 450,
      height: 680,
      preserveObjectStacking: true,
    });
    canv.on({
      "mouse:down": selectedObject,
    });
    getapi();
    handleJSONImport();
    loadOldData2();
  });
}, 1000);

// });

canv.on('object:modified', saveState);
canv.on('object:added', saveState);
canv.on('object:removed', saveState);


//get templates 
function getTemplates() {
  $.ajax({
    type: "GET",
    url: "/get-templates/" + window.location.pathname.split("/")[2],
    success: function (data) {

      var templates = $("#templates");

      // Check if data is an object
      if (typeof data === 'object') {
        // Convert object to array of templates
        const templatesArray = Object.values(data);

        // Use forEach to iterate over templates
        templatesArray.forEach((template) => {
          templates.empty();
          template.forEach((t) => {
            templates.append(`
              <div class="col-md-12 shadow border rounded p-3 template m-3 d-flex justify-content-center align-items-center flex-column" data-template="${t.id}">
                <img src="https://clickadmin.searchmarketingservices.online/storage/templates/${t.image}" class="shadow border img-fluid mt-5 p-0 rounded" width="300px" style="cursor:pointer"/>
                <p style="cursor:pointer" class="mt-3 mb-5 p-0 fw-bold text-dark">${t.name}</p>
              </div>
            `);
          })
        });

        $(".template").on('click', function () {
          var templateId = $(this).data("template");
          getTemplatewithId(templateId);
        });

      } else {
        console.error('Data is not an object:', data);
      }
    },
    error: function (xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
    },
  });
}

function getTemplatewithId(templateId) {
  $.ajax({
    type: "GET",
    url: `/get-template/${templateId}`,
    success: function (response) {
      if (response.data && response.data.length > 0) {
        const templateData = response.data[0];
        const jsonData = JSON.parse(templateData.json);
        canv.clear();
        canv.loadFromJSON(jsonData, canv.renderAll.bind(canv));
        updateCanvasHistory()
      } else {
        console.error('No template data found.');
      }
    },
    error: function (xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
    },
  });
}

function getTemplatewithId(templateId) {
  // Clear canvas
  canv.clear();

  // Display loading message
  const loadingText = new fabric.Text('Loading...', {
    fontFamily: 'Arial',
    fontSize: 20,
    fill: 'black'
  });

  // Calculate text width and height
  const textWidth = loadingText.getBoundingRect().width;
  const textHeight = loadingText.getBoundingRect().height;

  // Position text at the center of the canvas
  loadingText.set({
    left: (canv.width - textWidth) / 2,
    top: (canv.height - textHeight) / 2
  });

  canv.add(loadingText);
  canv.renderAll();

  $.ajax({
    type: "GET",
    url: `/get-template/${templateId}`,
    success: function (response) {
      if (response.data && response.data.length > 0) {
        const templateData = response.data[0];
        const jsonData = JSON.parse(templateData.json);
        canv.loadFromJSON(jsonData, canv.renderAll.bind(canv));
        updateCanvasHistory()
        // Remove loading message
        canv.remove(loadingText);
      } else {
        console.error('No template data found.');
      }
    },
    error: function (xhr, status, error) {
      console.error('Error fetching template data:', error);
    },
  });
}







function selectedObject(event) {
  if (event.target != null) {
    var selectBox = document.getElementById("font-selector2");
    var colorPicker = document.getElementById("colorPicker");

    // Get the selected option value
    var optionValue = event.target.fontFamily;
    selectBox.value = optionValue;

    // Get the selected color value
    var colorValue = event.target.fill;
    colorPicker.value = colorValue;
    saveState();
    saveAll();
  }


  selectedText = event.target;
  clicktextshow();
  clickimgshow();
  document.addEventListener('keydown', function (event) {
    // Check if delete key was pressed
    if (event.key === 'Delete') {
      // Remove the selected object from canvas
      if (selectedText) {
        canv.remove(selectedText);
        canv.requestRenderAll();
        // Add additional logic if needed (e.g., updating history, etc.)
      }
    }
  });

  document.addEventListener('keydown', function (event) {
    if (event.ctrlKey && event.key === 'z') {
      undo();
    } else if (event.ctrlKey && event.key === 'y') {
      redo();
    }
  });



  document.addEventListener('keydown', function (event) {
    const activeObject = canv.getActiveObject();

    if (activeObject) {
      const step = 3;
      switch (event.key) {
        case 'ArrowUp':
          activeObject.top -= step;
          break;
        case 'ArrowDown':
          activeObject.top += step;
          break;
        case 'ArrowLeft':
          activeObject.left -= step;
          break;
        case 'ArrowRight':
          activeObject.left += step;
          break;
      }
      canv.renderAll();
    }
  });
}


function uploadImageInCanvas(event) {
  console.log(event);
  console.log(event.target.files[0]);

  const file = event.target.files[0];
  const reader = new FileReader();
  reader.onload = function (e) {
    const imgObj = new Image();
    imgObj.src = e.target.result;
    imgObj.onload = function () {
      const image = new fabric.Image(imgObj);
      // Adjust image size to fit the canvas if it's larger
      if (image.width > canv.width || image.height > canv.height) {
        const scaleFactor = Math.min(
          canv.width / image.width,
          canv.height / image.height
        );
        image.scale(scaleFactor);
      }

      canv.add(image);
      saveState();
    };
  };
  reader.readAsDataURL(file);
}
function uploadStamp(event) {
  var formData = new FormData();
  formData.append('_token', this.token);
  formData.append('file', event.target.files[0]);
  formData.append('id_event', window.location.pathname.split("/")[2]);

  $.ajax({
    type: "POST",
    url: "/upload-stamp",
    data: formData,
    processData: false, // Prevent jQuery from automatically transforming the data into a query string
    contentType: false, // Prevent jQuery from overriding the Content-Type header
    success: function (response) {
      document.getElementById("uploadStamp").value = '';
      console.log(response);
      Swal.fire({
        icon: 'success',
        title: 'Stamp uploaded successfully',
        showConfirmButton: false,
        timer: 1500
      })
    },
    error: function (xhr, status, error) {
      document.getElementById("uploadStamp").value = '';
      console.error("Error:", error);
      // Handle the error
      Swal.fire({
        icon: 'error',
        title: 'Error uploading stamp',
        text: 'The file must be a file of type: jpeg, png, jpg.',
      })
    },
  });
}

// document.getElementById("yourFileInputId").onchange = uploadStamp;




function applyBold() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const isBold = !obj.get("fontWeight") || obj.get("fontWeight") === "bold"; // Toggle bold state
    obj.set({ fontWeight: isBold ? "normal" : "bold" });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply italic text effect
function applyItalic() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const isItalic = !obj.get("fontStyle") || obj.get("fontStyle") === "italic"; // Toggle italic state
    obj.set({ fontStyle: isItalic ? "normal" : "italic" });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply underline text effect
function applyUnderline() {

  const obj = canv.getActiveObject();

  if (obj && obj.type === "textbox") {

    if (obj.set("textDecoration" == "underline")) {
      obj.set("textDecoration", "none");
    } else {
      obj.set("textDecoration", "underline");
    }

    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply shadow text effect
function applyShadow() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const hasShadow = !obj.get("shadow") || obj.get("shadow") === null; // Toggle shadow state
    obj.set({ shadow: hasShadow ? "5px 5px 5px rgba(0,0,0,0.5)" : null });
    canv.renderAll();
    saveState();
    saveAll();
  }
}
fontselector2.addEventListener("click", function fontselect2() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const font = this.value;
    obj.set({ fontFamily: font });
    canv.renderAll();
    saveState();
    saveAll();
  }
});

function changeFontStyle(selectElement) {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const font = selectElement.value; // Access the value of the select element passed as an argument
    obj.set({ fontFamily: font });
    canv.renderAll();
  }
}

// Function to apply letter spacing text effect
function applyLetterSpacing() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const letterSpacing = obj.get("charSpacing") || 0;
    const newLetterSpacing = letterSpacing === 5 ? 0 : letterSpacing + 5; // Increment letter spacing
    obj.set({ charSpacing: newLetterSpacing });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply line height text effect
function applyLineHeight() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const lineHeight = obj.get("lineHeight") || 1;
    const newLineHeight = lineHeight === 1.5 ? 1 : lineHeight + 0.5; // Increment line height
    obj.set({ lineHeight: newLineHeight });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply border text effect
function applyBorder() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const hasBorder = !obj.get("stroke") || obj.get("stroke") === null; // Toggle border state
    obj.set({
      stroke: hasBorder ? "#000000" : null,
      strokeWidth: hasBorder ? 1 : 0,
    });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply text alignment text effect
function applyTextAlignment() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentAlign = obj.get("textAlign") || "left";
    const newAlign =
      currentAlign === "left"
        ? "center"
        : currentAlign === "center"
          ? "right"
          : "left";
    obj.set({ textAlign: newAlign });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply text rotation text effect
function applyTextRotation() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentRotation = obj.get("angle") || 0;
    const newRotation = currentRotation === 45 ? 0 : 45; // Toggle between 0 and 45 degrees
    obj.set({ angle: newRotation });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply color gradient text effect
function applyColorGradient() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    // Add logic for color gradient effect
    // Make changes to the selected text on the canvas
  }
}

// Function to apply text flip text effect
function applyTextFlip() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const isFlipped = !obj.get("flipX"); // Toggle flip state
    obj.set({ flipX: isFlipped });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply text transform text effect
function applyTextTransform() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentText = obj.text; // Get the current text
    const currentTransform = obj.get("customTextTransform") || "none"; // Custom property to store transform state
    let newText;
    let newTransform;
    if (currentTransform === "uppercase") {
      newText = currentText.toLowerCase();
      newTransform = "lowercase";
    } else {
      newText = currentText.toUpperCase();
      newTransform = "uppercase";
    }
    obj.set({
      text: newText,
      customTextTransform: newTransform // Save new transform state
    });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply text opacity text effect
function applyTextOpacity() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentOpacity = obj.get("opacity") || 1;
    const newOpacity = currentOpacity === 0.5 ? 1 : 0.5; // Toggle opacity state
    obj.set({ opacity: newOpacity });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply text effects presets text effect
function applyTextEffectsPresets() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    // Add logic for text effects presets
    // Make changes to the selected text on the canvas
  }
}

// Function to apply custom fonts text effect
function applyCustomFonts() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    // Add logic for custom fonts
    // Make changes to the selected text on the canvas
  }
}

// Function to apply highlight color text effect
function applyHighlightColor() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    // Add logic for highlight color effect
    // Make changes to the selected text on the canvas
  }
}

// Function to apply text effects animations text effect
function applyTextEffectsAnimations() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    // Add logic for text effects animations
    // Make changes to the selected text on the canvas
  }
}

function neonText() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const hasNeon = !obj.get("shadow") || obj.get("shadow") === null;
    obj.set({
      shadow: hasNeon
        ? {
            color: '#FFD017',
            blur: 20,
            offsetX: 0,
            offsetY: 0,
          }
        : null,
    });
    obj.set({ fill: hasNeon ? '#FFD017' : '#000000' });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply text mirror text effect
function applyTextMirror() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const isMirrored = !obj.get("flipY"); // Toggle flip state
    obj.set({ flipY: isMirrored });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply text ice text effect
function applyTextIce() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const isIced = !obj.get("shadow") || obj.get("shadow") === null;
    obj.set({
      shadow: isIced
        ? {
            color: '#00FFFF',
            blur: 10,
            offsetX: 0,
            offsetY: 0,
          }
        : null,
    });
    obj.set({ fill: isIced ? '#00FFFF' : '#000000' });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply text fire text effect
function applyTextFire() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const isFired = !obj.get("shadow") || obj.get("shadow") === null;
    obj.set({
      shadow: isFired
        ? {
            color: '#FF4500',
            blur: 15,
            offsetX: 0,
            offsetY: 0,
          }
        : null,
    });
    obj.set({ fill: isFired ? '#FF4500' : '#000000' });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply text rainbow text effect
function applyTextRainbow() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    // Add logic for rainbow color effect
    // This example simply sets a gradient fill
    obj.set({
      fill: new fabric.Gradient({
        type: 'linear',
        gradientUnits: 'percentage',
        coords: { x1: 0, y1: 0, x2: 1, y2: 0 },
        colorStops: [
          { offset: 0, color: '#FF0000' },
          { offset: 0.2, color: '#FF7F00' },
          { offset: 0.4, color: '#FFFF00' },
          { offset: 0.6, color: '#00FF00' },
          { offset: 0.8, color: '#0000FF' },
          { offset: 1, color: '#8B00FF' },
        ],
      }),
    });
    canv.renderAll();
    saveState();
    saveAll();
  }
}




// Function to apply sparkle text effect
function applyTextSparkle() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentEffect = obj.get("customTextEffect") || "none";
    const newEffect = currentEffect === "sparkle" ? "none" : "sparkle";

    if (newEffect === "sparkle") {
      obj.set({
        shadow: {
          color: '#FFFFFF',
          blur: 5,
          offsetX: 0,
          offsetY: 0,
        }
      });
    } else {
      obj.set({ shadow: null });
    }

    obj.set({ customTextEffect: newEffect });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply gradient stroke text effect
function applyGradientStroke() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentEffect = obj.get("customTextEffect") || "none";
    const newEffect = currentEffect === "gradientStroke" ? "none" : "gradientStroke";

    if (newEffect === "gradientStroke") {
      obj.set({
        stroke: new fabric.Gradient({
          type: 'linear',
          gradientUnits: 'percentage',
          coords: { x1: 0, y1: 0, x2: 1, y2: 1 },
          colorStops: [
            { offset: 0, color: 'red' },
            { offset: 1, color: 'blue' }
          ],
        }),
        strokeWidth: 2,
      });
    } else {
      obj.set({ stroke: null, strokeWidth: 0 });
    }

    obj.set({ customTextEffect: newEffect });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply shadow blur text effect
function applyShadowBlur() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentEffect = obj.get("customTextEffect") || "none";
    const newEffect = currentEffect === "shadowBlur" ? "none" : "shadowBlur";

    if (newEffect === "shadowBlur") {
      obj.set({
        shadow: {
          color: '#000000',
          blur: 15,
          offsetX: 0,
          offsetY: 0,
        }
      });
    } else {
      obj.set({ shadow: null });
    }

    obj.set({ customTextEffect: newEffect });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply reflection text effect
function applyTextReflection() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentEffect = obj.get("customTextEffect") || "none";
    const newEffect = currentEffect === "reflection" ? "none" : "reflection";

    if (newEffect === "reflection") {
      obj.set({
        reflection: {
          opacity: 0.5,
          distance: 10,
          scale: 1,
        }
      });
    } else {
      obj.set({ reflection: null });
    }

    obj.set({ customTextEffect: newEffect });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply metallic text effect
function applyTextMetallic() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentEffect = obj.get("customTextEffect") || "none";
    const newEffect = currentEffect === "metallic" ? "none" : "metallic";

    if (newEffect === "metallic") {
      obj.set({
        fill: new fabric.Gradient({
          type: 'linear',
          gradientUnits: 'percentage',
          coords: { x1: 0, y1: 0, x2: 1, y2: 1 },
          colorStops: [
            { offset: 0, color: '#C0C0C0' },
            { offset: 0.5, color: '#A9A9A9' },
            { offset: 1, color: '#808080' }
          ],
        }),
      });
    } else {
      obj.set({ fill: '#000000' });
    }

    obj.set({ customTextEffect: newEffect });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply neon text effect
function applyNeonText() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentEffect = obj.get("customTextEffect") || "none";
    const newEffect = currentEffect === "neon" ? "none" : "neon";

    if (newEffect === "neon") {
      obj.set({
        shadow: {
          color: '#39FF14',
          blur: 20,
          offsetX: 0,
          offsetY: 0,
        },
        fill: '#39FF14'
      });
    } else {
      obj.set({ shadow: null, fill: '#000000' });
    }

    obj.set({ customTextEffect: newEffect });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply vintage text effect
function applyTextVintage() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentEffect = obj.get("customTextEffect") || "none";
    const newEffect = currentEffect === "vintage" ? "none" : "vintage";

    if (newEffect === "vintage") {
      obj.set({
        fill: '#FFD700',
        fontFamily: 'Courier',
      });
    } else {
      obj.set({ fill: '#000000', fontFamily: 'Arial' });
    }

    obj.set({ customTextEffect: newEffect });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply holographic text effect
function applyTextHolographic() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentEffect = obj.get("customTextEffect") || "none";
    const newEffect = currentEffect === "holographic" ? "none" : "holographic";

    if (newEffect === "holographic") {
      obj.set({
        fill: new fabric.Gradient({
          type: 'linear',
          gradientUnits: 'percentage',
          coords: { x1: 0, y1: 0, x2: 1, y2: 1 },
          colorStops: [
            { offset: 0, color: '#FF00FF' },
            { offset: 0.25, color: '#00FFFF' },
            { offset: 0.5, color: '#FF0000' },
            { offset: 0.75, color: '#FFFF00' },
            { offset: 1, color: '#00FF00' }
          ],
        }),
      });
    } else {
      obj.set({ fill: '#000000' });
    }

    obj.set({ customTextEffect: newEffect });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply comic text effect
function applyTextComic() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentEffect = obj.get("customTextEffect") || "none";
    const newEffect = currentEffect === "comic" ? "none" : "comic";

    if (newEffect === "comic") {
      obj.set({
        fontFamily: 'Comic Sans MS',
        fontWeight: 'bold',
        stroke: '#000000',
        strokeWidth: 1,
      });
    } else {
      obj.set({ fontFamily: 'Arial', fontWeight: 'normal', stroke: null, strokeWidth: 0 });
    }

    obj.set({ customTextEffect: newEffect });
    canv.renderAll();
    saveState();
    saveAll();
  }
}


/////////////////////////////////////////////////////////////////////////
// Function to apply sparkle text effect
function applyTextSparkle() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentEffect = obj.get("customTextEffect") || "none";
    const newEffect = currentEffect === "sparkle" ? "none" : "sparkle";

    if (newEffect === "sparkle") {
      obj.set({
        shadow: {
          color: '#FFFFFF',
          blur: 5,
          offsetX: 0,
          offsetY: 0,
        }
      });
    } else {
      obj.set({ shadow: null });
    }

    obj.set({ customTextEffect: newEffect });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply gradient stroke text effect
function applyGradientStroke() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentEffect = obj.get("customTextEffect") || "none";
    const newEffect = currentEffect === "gradientStroke" ? "none" : "gradientStroke";

    if (newEffect === "gradientStroke") {
      obj.set({
        stroke: new fabric.Gradient({
          type: 'linear',
          gradientUnits: 'percentage',
          coords: { x1: 0, y1: 0, x2: 1, y2: 1 },
          colorStops: [
            { offset: 0, color: 'red' },
            { offset: 1, color: 'blue' }
          ],
        }),
        strokeWidth: 2,
      });
    } else {
      obj.set({ stroke: null, strokeWidth: 0 });
    }

    obj.set({ customTextEffect: newEffect });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply shadow blur text effect
function applyShadowBlur() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentEffect = obj.get("customTextEffect") || "none";
    const newEffect = currentEffect === "shadowBlur" ? "none" : "shadowBlur";

    if (newEffect === "shadowBlur") {
      obj.set({
        shadow: {
          color: '#000000',
          blur: 15,
          offsetX: 0,
          offsetY: 0,
        }
      });
    } else {
      obj.set({ shadow: null });
    }

    obj.set({ customTextEffect: newEffect });
    canv.renderAll();
    saveState();
    saveAll();
  }
}


// Function to apply holographic text effect
function applyTextHolographic() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentEffect = obj.get("customTextEffect") || "none";
    const newEffect = currentEffect === "holographic" ? "none" : "holographic";

    if (newEffect === "holographic") {
      obj.set({
        fill: new fabric.Gradient({
          type: 'linear',
          gradientUnits: 'percentage',
          coords: { x1: 0, y1: 0, x2: 1, y2: 1 },
          colorStops: [
            { offset: 0, color: '#FF00FF' },
            { offset: 0.25, color: '#00FFFF' },
            { offset: 0.5, color: '#FF0000' },
            { offset: 0.75, color: '#FFFF00' },
            { offset: 1, color: '#00FF00' }
          ],
        }),
      });
    } else {
      obj.set({ fill: '#000000' });
    }

    obj.set({ customTextEffect: newEffect });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply comic text effect
function applyTextComic() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentEffect = obj.get("customTextEffect") || "none";
    const newEffect = currentEffect === "comic" ? "none" : "comic";

    if (newEffect === "comic") {
      obj.set({
        fontFamily: 'Comic Sans MS',
        fontWeight: 'bold',
        stroke: '#000000',
        strokeWidth: 1,
      });
    } else {
      obj.set({ fontFamily: 'Arial', fontWeight: 'normal', stroke: null, strokeWidth: 0 });
    }

    obj.set({ customTextEffect: newEffect });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply text wave effect
function applyTextWave() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentEffect = obj.get("customTextEffect") || "none";
    const newEffect = currentEffect === "wave" ? "none" : "wave";

    if (newEffect === "wave") {
      const text = obj.text.split('').join(' ');
      let waveText = '';
      for (let i = 0; i < text.length; i++) {
        waveText += i % 2 === 0 ? text[i].toUpperCase() : text[i].toLowerCase();
      }
      obj.set({ text: waveText });
    } else {
      obj.set({ text: obj.text.toUpperCase() });
    }

    obj.set({ customTextEffect: newEffect });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

// Function to apply text shimmer effect
function applyTextShimmer() {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    const currentEffect = obj.get("customTextEffect") || "none";
    const newEffect = currentEffect === "shimmer" ? "none" : "shimmer";

    if (newEffect === "shimmer") {
      obj.set({
        shadow: {
          color: '#FFFFFF',
          blur: 5,
          offsetX: 0,
          offsetY: 0,
        },
        fill: new fabric.Gradient({
          type: 'linear',
          gradientUnits: 'percentage',
          coords: { x1: 0, y1: 0, x2: 1, y2: 1 },
          colorStops: [
            { offset: 0, color: '#FF69B4' },
            { offset: 0.5, color: '#FF1493' },
            { offset: 1, color: '#FF69B4' }
          ],
        }),
      });
    } else {
      obj.set({ shadow: null, fill: '#000000' });
    }

    obj.set({ customTextEffect: newEffect });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

/////////////////////////////////////////////////////////////////////////

document
  .getElementById("uploadImage2")
  .addEventListener("change", function (event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function (e) {
      const imgObj = new Image();
      imgObj.src = e.target.result;
      imgObj.onload = function () {
        const image = new fabric.Image(imgObj);
        // Adjust image size to fit the canvas if it's larger
        if (image.width > canv.width || image.height > canv.height) {
          const scaleFactor = Math.min(
            canv.width / image.width,
            canv.height / image.height
          );
          image.scale(scaleFactor);
        }

        canv.add(image);
        saveState();
      };
    };
    reader.readAsDataURL(file);
  });

document
  .getElementById("uploadImage")
  .addEventListener("change", function (event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function (e) {
      const imgObj = new Image();
      imgObj.src = e.target.result;
      imgObj.onload = function () {
        const image = new fabric.Image(imgObj);
        // Adjust image size to fit the canvas if it's larger
        if (image.width > canv.width || image.height > canv.height) {
          const scaleFactor = Math.min(
            canv.width / image.width,
            canv.height / image.height
          );
          image.scale(scaleFactor);
        }

        canv.add(image);
        saveState();
      };
    };
    reader.readAsDataURL(file);
  });

document.getElementById("deleteBtn").addEventListener("click", function () {
  const obj = canv.getActiveObject();
  if (obj) {
    canv.remove(obj);
    saveState();
  }
});

document.querySelector(".deleteBtn2").addEventListener("click", function () {
  const obj = canv.getActiveObject();
  if (obj) {
    canv.remove(obj);
    saveState();
  }
});

function moveForward() {
  canv.renderAll();

  const obj = canv.getActiveObject();
  if (obj) {
    canv.bringForward(obj);
    saveState();
    canv.renderAll();
  }
}

function moveBackword() {
  canv.renderAll();

  const obj = canv.getActiveObject();
  if (obj) {
    if (canv._currentTransform) {
      canv._currentTransform.target.setCoords();
    }

    canv.sendBackwards(obj);
    saveState();
    canv.renderAll();
  }
}
// Undo
var maxHistoryLength = 10;

document.getElementById("undoBtn").addEventListener("click", function () {
  undo();
});

function loadCanvasState() {
  canv.loadFromJSON(moveHistory[currentIndex], function () {
    canv.renderAll();
  });
}

function saveCanvasState() {
  moveHistory[currentIndex] = JSON.stringify(canv.toJSON());
  currentIndex++;

  if (currentIndex > maxHistoryLength) {
    moveHistory.shift();
    currentIndex = maxHistoryLength;
  }
}

// Redo
document.getElementById("redoBtn").addEventListener("click", function () {
  redo();
})
function giveRecordOfCard() {
  let record = [];
  for (let i = 0; i < canv._objects.length; i++) {
    if (
      typeof canv._objects[i] === "object" &&
      typeof canv._objects[i].toObject === "function"
    )
      record.push(canv._objects[i].toObject());
    else {
      continue;
    }
  }
  return JSON.stringify(record);
}

function boldBtn() {
  applyBold();
}

function italicBtn() {
  applyItalic();
}

function underlineBtn() {
  applyUnderline();
}

function shadowBtn() {
  applyShadow();
}

function letterSpacingBtn() {
  applyLetterSpacing();
}

function lineHeightBtn() {
  applyLineHeight();
}

function borderBtn() {
  applyBorder();
}

function textAlignmentBtn() {
  applyTextAlignment();
}

function textRotationBtn() {
  applyTextRotation();
}

function colorGradientBtn() {
  applyColorGradient();
}

function textFlipBtn() {
  applyTextFlip();
}

function textTransformBtn() {
  applyTextTransform();
}

function textOpacityBtn() {
  applyTextOpacity();
}

function textEffectsPresetsBtn() {
  applyTextEffectsPresets();
}

function customFontsBtn() {
  applyCustomFonts();
}

function highlightColorBtn() {
  applyHighlightColor();
}

function textEffectsAnimationsBtn() {
  applyTextEffectsAnimations();
}

// ... (add more event listeners for other text effects)

document.getElementById("opacityRange").addEventListener("input", function () {
  const obj = canv.getActiveObject();
  if (obj) {
    obj.set({ opacity: parseFloat(this.value) / 100 });
    canv.renderAll();
    saveState();
    saveAll();
  }
});
document.getElementById("opacityRange2").addEventListener("input", function () {
  const obj = canv.getActiveObject();
  if (obj) {
    obj.set({ opacity: parseFloat(this.value) / 100 });
    canv.renderAll();
    saveState();
    saveAll();
  }
});

function changeOpacity(value) {
  const obj = canv.getActiveObject();
  if (obj) {
    obj.set({ opacity: parseFloat(value.value) / 100 });
    canv.renderAll();
    saveState();
    saveAll();
  }
}

function addText() {
  const text = document.getElementById("textInput").value;
  const font = document.querySelector(".fontSelector1").value;
  const textbox = new fabric.Textbox(text, {
    left: 100,
    top: 100,
    width: 200,
    fontFamily: 'arial',
    editable: true,
    selectionColor: 'rgba(0, 0, 0, 0.3)',
  });
  canv.add(textbox);
  saveState();
  saveAll();

  canv.setActiveObject(textbox);
  canv.requestRenderAll();
  textbox.enterEditing();
  textbox.hiddenTextarea.focus();
}

document
  .getElementById("uploadSticker")
  .addEventListener("change", function (event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function (e) {
      const imgObj = new Image();
      imgObj.src = e.target.result;
      imgObj.onload = function () {
        const sticker = new fabric.Image(imgObj);

        // Adjust sticker size to fit the canvas if it's larger
        if (sticker.width > canv.width || sticker.height > canv.height) {
          const scaleFactor = Math.min(
            canv.width / sticker.width,
            canv.height / sticker.height
          );
          sticker.scale(scaleFactor);
        }

        canv.add(sticker);
        saveState();
        saveAll();
      };
    };
    reader.readAsDataURL(file);
  });

// Undo


function loadCanvasState() {
  canv.loadFromJSON(moveHistory[currentIndex], function () {
    canv.renderAll();
  });
}

function saveCanvasState() {
  moveHistory[currentIndex] = JSON.stringify(canv.toJSON());
  currentIndex++;

  if (currentIndex > maxHistoryLength) {
    moveHistory.shift();
    currentIndex = maxHistoryLength;
  }
}


// Redo
document.getElementById("redoBtn").addEventListener("click", function () {
  redo();
});

document.querySelector(".deleteBtn").addEventListener("click", function () {
  const obj = canv.getActiveObject();
  if (obj) {
    canv.remove(obj);
    saveState();
    saveAll();
  }
});

document.querySelector(".deleteBtn1").addEventListener("click", function () {
  const obj = canv.getActiveObject();
  if (obj) {
    canv.remove(obj);
    saveState();
    saveAll();
  }
});
document.querySelector(".deleteBtn2").addEventListener("click", function () {

  const obj = canv.getActiveObject();
  if (obj) {
    canv.remove(obj);
    saveState();
    saveAll();
  }
});
document.querySelector(".deleteBtn3").addEventListener("click", function () {

  const obj = canv.getActiveObject();
  if (obj) {
    canv.remove(obj);
    saveState();
    saveAll();
  }
});

document.addEventListener("keydown", function (event) {
  if (event.code === "Delete" || event.code === "Backspace") {
    const obj = canv.getActiveObject();
    if (obj) {
      canv.remove(obj);
      saveState();
      saveAll();
    }
  }
});


document.getElementById("canvasColor").addEventListener("input", function () {
  const color = document.getElementById("canvasColor").value;
  canv.setBackgroundColor(color, function () {

    canv.renderAll();
    saveState();
    saveAll();
  });
});

function chnageBGColor() {
  const color = document.getElementById("canvasColor").value;
  canv.setBackgroundColor(color, function () {
    canv.renderAll();
    saveState();
    saveAll();
  });
}

document.getElementById("fontSelector").addEventListener("change", function () {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    obj.set({ fontFamily: this.value });
    canv.renderAll();
    saveState();
    saveAll();
  }
});

document.getElementById("textColor").addEventListener("input", function () {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    obj.set({ fill: this.value });
    canv.renderAll();
    saveState();
    saveAll();
  }
});

document.getElementById("fontSize").addEventListener("input", function () {
  const obj = canv.getActiveObject();
  if (obj && obj.type === "textbox") {
    obj.set({ fontSize: parseInt(this.value, 10) });
    canv.renderAll();
    saveState();
    saveAll();
  }
});

document.getElementById("saveBtn").addEventListener("click", function () {
  alert("Work has been saved!");
});

document.getElementById("downloadBtn").addEventListener("click", function () {
  const dataUrl = canv.toDataURL({
    format: "png",
    multiplier: 2, // Increase multiplier for higher resolution
  });
  const link = document.createElement("a");
  link.href = dataUrl;
  link.download = "canvas_image.png";
  link.click();
});

canv.on("selection:created", function (options) {
  updateControls(options.target);
});

canv.on("selection:updated", function (options) {
  updateControls(options.target);
});

function updateControls(target) {
  // if (target && target.type === "textbox") {
  //   document.getElementById("textInput").value = target.text;
  //   document.getElementById("textColor").value = target.fill;
  //   document.getElementById("fontSize").value = target.fontSize;
  //   document.getElementById("fontSelector").value = target.fontFamily;
  // }
}

function clicktextshow() {
  try {
    if (typeof selectedText.text === "string") {
      document.querySelector(".sidebaraddtext").style.display = "inline-block";
      document.querySelector("#sidebarbackgroundaddimg1").style.display =
        "none";
      document.querySelector(".sidebaraddimg").style.display = "none";

      document.querySelector("#viewTemplates").style.display = "none";
    }
  } catch {
    document.querySelector("#sidebarbackgroundaddimg1").style.display = "none";
    document.querySelector(".sidebaraddimg").style.display = "none";

    document.querySelector(".sidebaraddtext").style.display = "none";
    document.querySelector("#viewTemplates").style.display = "none";
  }
}

function clickimgshow() {
  try {
    if (selectedText._element.className == "canvas-img") {
      document.querySelector(".sidebaraddtext").style.display = "none";
      document.querySelector(".sidebaraddimg").style.display = "inline-block";
      document.querySelector("#sidebarbackgroundaddimg1").style.display =
        "none";
      document.querySelector("#viewTemplates").style.display = "none";
    }
  } catch {
    document.querySelector(".sidebaraddimg").style.display = "none";
    document.querySelector("#sidebarbackgroundaddimg1").style.display = "none";

    document.querySelector("#viewTemplates").style.display = "none";
  }
}

function sideimg1() {
  document.querySelector(".sidebaraddtext").style.display = "none";
  document.querySelector("#viewTemplates").style.display = "none";
  document.querySelector("#sidebarbackgroundaddimg1").style.display = "none";
  document.querySelector(".sidebaraddimg").style.display = "inline-block";
}

function sidebarbackaddimg() {
  document.querySelector(".sidebaraddtext").style.display = "none";
  document.querySelector("#viewTemplates").style.display = "none";
  document.querySelector(".sidebaraddimg").style.display = "none";
  document.querySelector("#sidebarbackgroundaddimg1").style.display =
    "inline-block";

}

trash.addEventListener("click", () => {
  canv.remove(selectedText);
  canv.renderAll();
});

function deleteSelected() {
  const obj = canv.getActiveObject();
  canv.remove(obj);
  canv.renderAll();
}

trash2.addEventListener("click", () => {
  canv.remove(selectedText);
  canv.renderAll();
});

function deleteImage() {
  canv.remove(selectedText);
  saveState();
  canv.renderAll();
}

textalign.addEventListener("click", () => {
  var center = "center";
  selectedText.set({ textAlign: center });
  canv.renderAll();
});

textalignleft.addEventListener("click", () => {
  var left = "left";
  selectedText.set({ textAlign: left });
  canv.renderAll();
});
textalignright.addEventListener("click", () => {
  var right = "right";
  selectedText.set({ textAlign: right });
  canv.renderAll();
});

function showTxtTool() {
  document.querySelector(".sidebaraddtext").style.display = "inline-block";
  document.querySelector(".sidebaraddimg").style.display = "none";
  document.querySelector("#viewTemplates").style.display = "none";
  document.querySelector("#sidebarbackgroundaddimg1").style.display = "none";
}

function increaseText() {
  var currentFontSize = selectedText.get("fontSize");
  var newFontSize = currentFontSize + 2;
  selectedText.set({ fontSize: newFontSize });
  canv.renderAll();
  font_number.innerText = newFontSize;
}

function increaseImageSize() {
  var currentScaleX = selectedText.scaleX;
  var currentScaleY = selectedText.scaleY;
  var newScaleX = currentScaleX * 1.2;
  var newScaleY = currentScaleY * 1.2;
  selectedText.set({ scaleX: newScaleX, scaleY: newScaleY });

  canv.renderAll();

}

function decreaseImageSize() {
  var currentScaleX = selectedText.scaleX;
  var currentScaleY = selectedText.scaleY;
  var newScaleX = currentScaleX * 0.8;
  var newScaleY = currentScaleY * 0.8;
  selectedText.set({ scaleX: newScaleX, scaleY: newScaleY });

  canv.renderAll();

}
function decreaseText() {
  var currentFontSize = selectedText.get("fontSize");
  var newFontSize = currentFontSize - 2;
  selectedText.set({ fontSize: newFontSize });
  canv.renderAll();
  font_number.innerText = newFontSize;
}



function changeTextColor2() {
  const obj = canv.getActiveObject();
  const color = document.getElementById("colorPicker").value;
  if (obj && obj.type === "textbox") {
    obj.set({ fill: color });
    canv.renderAll();
    saveState();
    saveAll();
  }
}



const fontSelector = document.getElementById("font-selector");
const font = document.getElementById("font");
fontSelector.addEventListener("click", function fontselect() {
  // const selectedFont = this.value;
  // font.style.fontFamily = selectedFont;
  // selectedText.set({ fontFamily: selectedFont });
  // canv.renderAll();
});

clone.addEventListener("click", function cloneTxt() {
  if (selectedText) {
    var clonedText = new fabric.IText(selectedText.text, {
      left: selectedText.left + 20,
      top: selectedText.top + 20,
      fontSize: selectedText.fontSize,
      fill: selectedText.fill,
      fontFamily: selectedText.fontFamily,
    });
    canv.add(clonedText);
    clonedText.set("zIndex", 100);
    canv.bringForward(clonedText);
    canv.moveTo(object, clonedText);
    canv.renderAll();
  }
  canv.renderAll();
});

function downloadJSON() {
  const json = JSON.stringify(canv.toJSON());
  const blob = new Blob([json], { type: "application/json" });
  const url = (window.webkitURL || window.URL).createObjectURL(blob);
  const a = document.createElement("a");
  a.href = url;
  a.download = "canvas.json";
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);
  (window.webkitURL || window.URL).revokeObjectURL(url);
}

function downloadImage() {
  const imgData = canv.toDataURL({ format: "png", quality: 1 });
  const link = document.createElement("a");
  link.href = imgData;
  link.download = "canvas.png";
  link.click();
}

function downloadSVG() {
  const svgData = canv.toSVG();
  const blob = new Blob([svgData], { type: "image/svg+xml" });
  const url = URL.createObjectURL(blob);
  const a = document.createElement("a");
  a.href = url;
  a.download = "canvas.svg";
  a.click();
  URL.revokeObjectURL(url);
}

export1.addEventListener("click", async () => {
  try {
    saveData();
    const pdfDoc = await PDFLib.PDFDocument.create();
    const page = pdfDoc.addPage([450, 680]);

    const imgData = canv.toDataURL("image/png");

    const image = await pdfDoc.embedPng(imgData);
    const { width, height } = image.scale(1);
    page.drawImage(image, {
      x: 0,
      y: 0,
      width,
      height,
      opacity: 1,
    });

    const pdfBytes = await pdfDoc.save();
    const pdfBlob = new Blob([pdfBytes], {
      type: "application/pdf",
    });
    const downloadLink = document.createElement("a");
    if (typeof window.URL.createObjectURL === "undefined") {
      if (typeof webkitURL !== "undefined") {
        window.URL = webkitURL;
      } else {
        throw new Error("Your browser does not support downloading files.");
      }
    }
    downloadLink.href = window.URL.createObjectURL(pdfBlob);
    downloadLink.download = "output.pdf";
    downloadLink.click();
  } catch (error) {
    console.error("Error:", error);
  }
});

var imageInput = document.getElementById("imageInput");

imageInput.addEventListener("change", function (e) {
  var files = e.target.files;

  if (files) {
    for (var i = 0; i < files.length; i++) {
      var file = files[i];
      var reader = new FileReader();
      reader.onload = function (event) {
        var img = new Image();
        img.src = event.target.result;
        img.onload = function () {
          const desiredWidth = 200;
          const desiredHeight = 200;
          img.scaleX = desiredWidth / img.width;
          img.scaleY = desiredHeight / img.height;
          var fabricImage = new fabric.Image(img, {
            left: 100,
            top: 100,
            width: img.width,
            height: img.height,
            scaleX: img.scaleX,
            scaleY: img.scaleY,
            zIndex: 50,
          });
          addImageToCanvas(fabricImage);
          fabricImage.set("zIndex", 50), fabricImage.sendToBack();
        };
      };
      reader.readAsDataURL(file);
    }
  }
});

function addImageToCanvas(fabricImage) {
  canv.add(fabricImage);
  canv.sendToBack(fabricImage);
}
function generateCanvasImageFromJSON(jsonData) {
  const canvasData = JSON.parse(jsonData);
  const canvas = document.createElement("canvas");
  const ctx = canvas.getContext("2d");
  canvas.width = canvasData.width;
  canvas.height = canvasData.height;
  const img = new Image();
  img.src = canvasData.imageDataUrl;
  img.onload = function () {
    ctx.drawImage(img, 0, 0);
    const canvasImageDataUrl = canvas.toDataURL("image/png");
    const imgElement = document.createElement("img");
    imgElement.src = canvasImageDataUrl;
    document.body.appendChild(imgElement);
  };
}
function handleJSONImport() {
  var id = window.location.pathname.split("/")[2];
  const backElement = document.getElementById('back');
  const backElement2 = document.getElementById('back2');
  if (backElement.checked) {
    console.log("Back is checked.");
    console.log("Get Back Json.");
    $.ajax({
      type: "GET",
      url: `/get-json/back?id=${id}`,
      success: function (response) {
        if (response) {
          if (response.data == null) {
            if (canv.backgroundImage == null) {
              var imageUrl = "https://clickadmin.searchmarketingservices.online/eventcards/1690902229.jpeg";
              // Load the background image onto the canvas
              fabric.Image.fromURL(imageUrl, function (img) {
                // Adjust the image size to fit the canvas
                img.scaleToWidth(canv.width);
                img.scaleToHeight(canv.height);
                canv.setBackgroundImage(img, canv.renderAll.bind(canv), {
                  // Set options as needed
                  originX: 'left',
                  originY: 'top'
                });
              });
            }

            if (!Array.isArray(canv._iTextInstances) || canv._iTextInstances.length === 0) {
              addGroom();
              addBride();
              addAnd();
              AddEvent();
              AddTime();
              AddPlace();
              AddCity();
            }
          }
        } else {
        }
        const file = response.data;
        fetch(`/Json/${file}`)
          .then((res) => {
            return res.json();
          })
          .then(function (data) {
            const jsonData = data;

            if (jsonData.objects.length == 1) {
              // Check if the canvas has no iText instances
              if (canv.backgroundImage == null) {
                var imageUrl = "https://clickadmin.searchmarketingservices.online/eventcards/1690902229.jpeg";
                // Load the background image onto the canvas
                fabric.Image.fromURL(imageUrl, function (img) {
                  // Adjust the image size to fit the canvas
                  img.scaleToWidth(canv.width);
                  img.scaleToHeight(canv.height);
                  canv.setBackgroundImage(img, canv.renderAll.bind(canv), {
                    // Set options as needed
                    originX: 'left',
                    originY: 'top'
                  });
                });
              }

              if (!Array.isArray(canv._iTextInstances) || canv._iTextInstances.length === 0) {
                addGroom();
                addBride();
                addAnd();
                AddEvent();
                AddTime();
                AddPlace();
                AddCity();
              }
            } else {
              canv.clear();
              canv.loadFromJSON(jsonData, function () {
                canv.requestRenderAll();
              });
            }

          });
      },
    });
  } else if (backElement2.checked) {
    console.log("Back is checked.");
    console.log("Get Back Json.");
    $.ajax({
      type: "GET",
      url: `/get-json/back?id=${id}`,
      success: function (response) {
        if (response) {
          if (response.data == null) {
            if (canv.backgroundImage == null) {
              var imageUrl = "https://clickadmin.searchmarketingservices.online/eventcards/1690902229.jpeg";
              // Load the background image onto the canvas
              fabric.Image.fromURL(imageUrl, function (img) {
                // Adjust the image size to fit the canvas
                img.scaleToWidth(canv.width);
                img.scaleToHeight(canv.height);
                canv.setBackgroundImage(img, canv.renderAll.bind(canv), {
                  // Set options as needed
                  originX: 'left',
                  originY: 'top'
                });
              });
            }

            if (!Array.isArray(canv._iTextInstances) || canv._iTextInstances.length === 0) {
              addGroom();
              addBride();
              addAnd();
              AddEvent();
              AddTime();
              AddPlace();
              AddCity();
            }
          }
        } else {
        }
        const file = response.data;
        fetch(`/Json/${file}`)
          .then((res) => {
            return res.json();
          })
          .then(function (data) {
            const jsonData = data;

            if (jsonData.objects.length == 1) {
              // Check if the canvas has no iText instances
              if (canv.backgroundImage == null) {
                var imageUrl = "https://clickadmin.searchmarketingservices.online/eventcards/1690902229.jpeg";
                // Load the background image onto the canvas
                fabric.Image.fromURL(imageUrl, function (img) {
                  // Adjust the image size to fit the canvas
                  img.scaleToWidth(canv.width);
                  img.scaleToHeight(canv.height);
                  canv.setBackgroundImage(img, canv.renderAll.bind(canv), {
                    // Set options as needed
                    originX: 'left',
                    originY: 'top'
                  });
                });
              }

              if (!Array.isArray(canv._iTextInstances) || canv._iTextInstances.length === 0) {
                addGroom();
                addBride();
                addAnd();
                AddEvent();
                AddTime();
                AddPlace();
                AddCity();
              }
            } else {
              canv.clear();
              canv.loadFromJSON(jsonData, function () {
                canv.requestRenderAll();
              });
            }

          });
      },
    });
  } else {
    console.log("Back is not checked.");
    console.log("Get Front Json.");
    $.ajax({
      type: "GET",
      url: `/get-json?id=${id}`,
      success: function (response) {
        if (response) {
          if (response.data == null) {
            if (canv.backgroundImage == null) {
              var imageUrl = "https://clickadmin.searchmarketingservices.online/eventcards/1690902229.jpeg";
              // Load the background image onto the canvas
              fabric.Image.fromURL(imageUrl, function (img) {
                // Adjust the image size to fit the canvas
                img.scaleToWidth(canv.width);
                img.scaleToHeight(canv.height);
                canv.setBackgroundImage(img, canv.renderAll.bind(canv), {
                  // Set options as needed
                  originX: 'left',
                  originY: 'top'
                });
              });
            }

            if (!Array.isArray(canv._iTextInstances) || canv._iTextInstances.length === 0) {
              addGroom();
              addBride();
              addAnd();
              AddEvent();
              AddTime();
              AddPlace();
              AddCity();
            }
          }
        } else {
        }
        const file = response.data;
        fetch(`/Json/${file}`)
          .then((res) => {
            return res.json();
          })
          .then(function (data) {
            const jsonData = data;

            if (jsonData.objects.length == 1) {
              // Check if the canvas has no iText instances
              if (canv.backgroundImage == null) {
                var imageUrl = "https://clickadmin.searchmarketingservices.online/eventcards/1690902229.jpeg";
                // Load the background image onto the canvas
                fabric.Image.fromURL(imageUrl, function (img) {
                  // Adjust the image size to fit the canvas
                  img.scaleToWidth(canv.width);
                  img.scaleToHeight(canv.height);
                  canv.setBackgroundImage(img, canv.renderAll.bind(canv), {
                    // Set options as needed
                    originX: 'left',
                    originY: 'top'
                  });
                });
              }

              if (!Array.isArray(canv._iTextInstances) || canv._iTextInstances.length === 0) {
                addGroom();
                addBride();
                addAnd();
                AddEvent();
                AddTime();
                AddPlace();
                AddCity();
              }
            } else {
              canv.clear();
              canv.loadFromJSON(jsonData, function () {
                canv.requestRenderAll();
              });
            }

          });
      },
    });
  }
}
function undoCanvas() {
  if (canvasHistory.length > 0) {
    canvasHistory.pop();

    var previousState = canvasHistory[canvasHistory.length - 1];

    if (previousState) {
      canv.loadFromJSON(previousState, function () {
        canv.renderAll();
      });
    }
  } else {
  }
}
function canvaClear() {
  // Clear the current canvas instance
  updateCanvasHistory();
  canv.clear();

  // Create a new Fabric.js canvas instance
  canv.add(
    new fabric.Rect({
      width: canv.width,
      height: canv.height,
      fill: "transparent",
      selectable: false,
    })
  );

  // Attach event listeners to the new canvas instance
  canv.on({
    "mouse:down": selectedObject,
  });
}

function dublicateObject() {
  var object = canv.getActiveObject();

  object.clone(function (e) {
    canv.add(
      e.set({
        left: object.left + 10,
        top: object.top + 10,
      })
    );
  });
}

function handleSVGImport(event) {
  const fileInput1 = event.target;
  const file1 = fileInput1.files[0];
  if (file1) {
    const reader = new FileReader();
    reader.onload = function (e) {
      try {
        const svgData = e.target.result;
        canv.clear();
        fabric.loadSVGFromString(svgData, (objects, options) => {
          const group = new fabric.Group(objects, options);
          canv.add(group);
          canv.renderAll();
        });
      } catch (error) {
        console.error("Error loading SVG:", error);
      }
    };
    reader.readAsText(file1);
  }
}

addsticker.addEventListener("click", () => {
  sideshow.style.display == "none"
    ? (sideshow.style.display = "inline-block")
    : (sideshow.style.display = "none");
});
document.getElementById("imageInput1").addEventListener("change", function (e) {
  var fileInput = e.target;
  var file = fileInput.files[0];
  if (file) {
    var reader = new FileReader();

    reader.onload = function (e) {
      var imgURL = e.target.result;

      fabric.Image.fromURL(imgURL, function (img) {
        canv.setBackgroundImage(img, canv.renderAll.bind(canv), {
          scaleX: canv.width / img.width,
          scaleY: canv.height / img.height,
        });
      });
    };

    reader.readAsDataURL(file);
  }
});

var API_KEY = "39819870-b0f877f9b101769c1f36d42d9";
var resultsDiv = document.getElementById("stickerList");

document.getElementById("btnSearch").addEventListener("click", (ev) => {
  ev.preventDefault();
  var searchTerm = document.getElementById("searchInput").value;
  var URL = `https://pixabay.com/api/?key=39819870-b0f877f9b101769c1f36d42d9&q= ${encodeURIComponent(
    searchTerm
  )}&safeSearch=true`;
  var spinner = `<div class="spinner-border text-primary" role="status">
  <span class="visually-hidden">Loading...</span>
  </div>`;
  document.getElementById("btnSearch").innerHTML = spinner;
  // fetch(URL)
  //   .then((response) => response.json())
  //   .then((data) => {
  //     var html = "<br>";
  //     if (data.totalHits > 0) {
  //       data.hits.forEach(function (hit, i) {
  //         html += `<img src="${hit.previewURL}" alt="${hit.tags}" width="150px" height="150px"  style='z-index: -10'  >`;
  //         stickers.push({ src: hit.previewURL });
  //       });
  //       resultsDiv.innerHTML = html;
  //     } else {
  //       resultsDiv.innerHTML = "No hits";
  //     }
  //     document.getElementById("btnSearch").innerText = `Search`;
  //   })
  //   .catch((error) => {
  //     console.error("Error fetching data:", error);
  //   });
});

function stickerLoad(data) {
  var spinner = `<div class="spinner-border text-primary" role="status">
    <span class="visually-hidden">Loading...</span>
    </div>`;
  document.getElementById("btnSearch").innerHTML = spinner;

  var html = "<br>";
  var resultsDiv = document.getElementById("stickerList");
  if (data.length > 0) {
    data.forEach(function (hit, i) {
      html += `<img src="https://clickadmin.searchmarketingservices.online/stickers/${hit.img}" alt="${hit.tags}" width="150px" height="150px" style='z-index: -10'  >`;
      stickers.push({ src: hit.img });
    });
    //sideshow.style.display = "inline-block";
    resultsDiv.innerHTML = html;
  } else {
    resultsDiv.innerHTML = "No hits";
  }
  document.getElementById("btnSearch").innerText = `Search`;

}
function show() {
  if (sideshow.style.display == "inline-block") {
    sideshow.style.display = "none";
  } else {
    sideshow.style.display = "inline-block";

  }
}

resultsDiv.addEventListener("click", (event) => {
  if (event.target.tagName === "IMG") {
    const clickedImgSrc = event.target.src;

    const clickedSticker = stickers.find(
      (sticker) => sticker.src === clickedImgSrc
    );

    if (clickedSticker) {
      addStickerToCanvas(clickedSticker);
      sideshow.style.display = "none";
    }
  }
});


function addStickerToCanvas(sticker) {
  fabric.Image.fromURL(
    sticker,
    (img) => {
      const desiredWidth = 100;
      const desiredHeight = 100;
      img.scaleToWidth(desiredWidth);
      img.scaleToHeight(desiredHeight);
      img.set({
        left: 100,
        top: 100,
      });

      // Find the maximum zIndex among existing objects
      let maxZIndex = 0;
      canv.forEachObject(function (obj) {
        if (obj && obj.zIndex && obj.zIndex > maxZIndex) {
          maxZIndex = obj.zIndex;
        }
      });

      // Set zIndex of the new image to be one greater than the maximum zIndex
      img.set('zIndex', maxZIndex + 1);
      canv.add(img);
      canv.setActiveObject(img);
      selectedText = img;
    },
    { crossOrigin: "Anonymous" }
  );
}


let token = "";
async function getapi() {
  // Storing response
  const response = await fetch("/get-csrf-token");

  // Storing data in form of JSON
  var data = await response.text();

  this.token = data;
}

// Save Button
var save1 = document.getElementById("save2");
save1.addEventListener("click", function () {
  saveData();
});

function saveData() {
  const backElement = document.getElementById('back');
  const backElement2 = document.getElementById('back2');
  if (backElement.checked) {
    console.log("Back is checked.Preview");
    const json = JSON.stringify(canv.toJSON());
    const blob = new Blob([json], { type: "application/json" });


    const formData = new FormData();
    var filename = window.location.pathname.split("/")[2] + ".json";

    const dataUrl = canv.toDataURL("image/png");

    formData.append("json_blob", [json]);
    formData.append("event_id", window.location.pathname.split("/")[2]);
    formData.append("_token", this.token);
    formData.append("data_url", dataUrl);
    // Make an HTTP POST request to a Laravel route
    fetch("/save-blob/back", {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        if (response.ok) {
          loadOldData2();
        } else {
          console.error("Failed to save Blob data on the server.");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
    // saveSetting();
  } else if (backElement2.checked) {
    console.log("Back is checked.");
    console.log("Get Back Json.");
    $.ajax({
      type: "GET",
      url: `/get-json/back?id=${id}`,
      success: function (response) {
        if (response) {
          if (response.data == null) {
            if (canv.backgroundImage == null) {
              var imageUrl = "https://clickadmin.searchmarketingservices.online/eventcards/1690902229.jpeg";
              // Load the background image onto the canvas
              fabric.Image.fromURL(imageUrl, function (img) {
                // Adjust the image size to fit the canvas
                img.scaleToWidth(canv.width);
                img.scaleToHeight(canv.height);
                canv.setBackgroundImage(img, canv.renderAll.bind(canv), {
                  // Set options as needed
                  originX: 'left',
                  originY: 'top'
                });
              });
            }

            if (!Array.isArray(canv._iTextInstances) || canv._iTextInstances.length === 0) {
              addGroom();
              addBride();
              addAnd();
              AddEvent();
              AddTime();
              AddPlace();
              AddCity();
            }
          }
        } else {
        }
        const file = response.data;
        fetch(`/Json/${file}`)
          .then((res) => {
            return res.json();
          })
          .then(function (data) {
            const jsonData = data;

            if (jsonData.objects.length == 1) {
              // Check if the canvas has no iText instances
              if (canv.backgroundImage == null) {
                var imageUrl = "https://clickadmin.searchmarketingservices.online/eventcards/1690902229.jpeg";
                // Load the background image onto the canvas
                fabric.Image.fromURL(imageUrl, function (img) {
                  // Adjust the image size to fit the canvas
                  img.scaleToWidth(canv.width);
                  img.scaleToHeight(canv.height);
                  canv.setBackgroundImage(img, canv.renderAll.bind(canv), {
                    // Set options as needed
                    originX: 'left',
                    originY: 'top'
                  });
                });
              }

              if (!Array.isArray(canv._iTextInstances) || canv._iTextInstances.length === 0) {
                addGroom();
                addBride();
                addAnd();
                AddEvent();
                AddTime();
                AddPlace();
                AddCity();
              }
            } else {
              canv.clear();
              canv.loadFromJSON(jsonData, function () {
                canv.requestRenderAll();
              });
            }

          });
      },
    });
  } else {
    console.log("Back is not checked.");
    const json = JSON.stringify(canv.toJSON());
  const blob = new Blob([json], { type: "application/json" });


  const formData = new FormData();
  var filename = window.location.pathname.split("/")[2] + ".json";
  const dataUrl = canv.toDataURL("image/png");
  
  formData.append("json_blob", [json]);
  formData.append("event_id", window.location.pathname.split("/")[2]);
  formData.append("_token", this.token);
  formData.append("data_url", dataUrl);
  // Make an HTTP POST request to a Laravel route
  fetch("/save-blob", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (response.ok) {
        loadOldData2();
      } else {
        console.error("Failed to save Blob data on the server.");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
  // saveSetting();
  }
}

function saveSetting() {
  let rspvVal = "";
  for (let index = 1; index <= 6; index++) {
    if (document.getElementById("flexCheckChecked" + index).checked) {
      rspvVal += "1,";
    } else {
      rspvVal += "0,";
    }

    AllBgname = document.getElementsByClassName("bgName");
    var bgName;
    for (let index = 0; index < AllBgname.length; index++) {
      if (AllBgname[index].checked) {
        bgName = AllBgname[index].value;
      }
    }
  }
  let msg = document.getElementById("msgTitle").value;
  getapi();

  $.ajax({
    type: "POST",
    url: "/event/card",
    data: JSON.stringify({
      _token: this.token,
      event_id: window.location.pathname.split("/")[2],
      rsvp: rspvVal.substring(0, 11),
      msg: msg,
      bgName: bgName,
      envTitleFont: document.getElementById("font-selectorsetting").value,
      envTitleColor: document.getElementById("colorPickersetting").value,
      colorOut: document.getElementById("colorPickerenvelope_outsetting").value,
      colorIn: document.getElementById("colorPickerenvelope_innersetting")
        .value,
    }),
    dataType: "json",
    contentType: "application/json",
    success: function (msg) {
      $("#exampleModal").modal("hide");
    },
    error: function (xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
    },
  });
}

function saveAll() {

  const backElement = document.getElementById('back');
  const backElement2 = document.getElementById('back2');
  if (backElement.checked) {
    console.log("Back is checked.");

    document.getElementById("save1").innerHTML = `<svg width="41" height="40" viewBox="0 0 51 50" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M25.1634 4.16669C13.6759 4.16669 4.33008 13.5125 4.33008 25C4.33008 36.4875 13.6759 45.8334 25.1634 45.8334C36.6509 45.8334 45.9967 36.4875 45.9967 25C45.9967 13.5125 36.6509 4.16669 25.1634 4.16669ZM25.1634 41.6667C15.9738 41.6667 8.49675 34.1896 8.49675 25C8.49675 15.8104 15.9738 8.33335 25.1634 8.33335C34.353 8.33335 41.8301 15.8104 41.8301 25C41.8301 34.1896 34.353 41.6667 25.1634 41.6667Z" fill="#C09D2A"/>
  <path d="M20.9949 28.3063L16.2053 23.525L13.2637 26.475L20.9991 34.1938L34.9699 20.2229L32.0241 17.2771L20.9949 28.3063Z" fill="#C09D2A"/>
  </svg> Saving...`;
    document.getElementById("save1").classList.add("disabled-button");
    document.getElementById("save1").disabled = true;
    var saveBtns = document.getElementsByClassName("SaveBtn");
    for (var i = 0; i < saveBtns.length; i++) {
      saveBtns[i].innerText = "Saving...";
      saveBtns[i].classList.add("disabled-button");
      saveBtns[i].disabled = true;
    }
    const json = JSON.stringify(canv.toJSON());
    const dddd = canv.toDataURL({
      format: "png",
      multiplier: 1,
    });
    const blob = new Blob([json], { type: "application/json" });

    const formData = new FormData();
    var filename = window.location.pathname.split("/")[2] + ".json";
    formData.append("json_blob", [json]);
    formData.append("event_id", window.location.pathname.split("/")[2]);
    formData.append("_token", this.token);
    formData.append("data_url", dddd)

    fetch("/save-blob/back", {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        if (response.ok) {
          loadOldData2();
          document.getElementById("save1").innerHTML = `<svg width="41" height="40" viewBox="0 0 51 50" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M25.1634 4.16669C13.6759 4.16669 4.33008 13.5125 4.33008 25C4.33008 36.4875 13.6759 45.8334 25.1634 45.8334C36.6509 45.8334 45.9967 36.4875 45.9967 25C45.9967 13.5125 36.6509 4.16669 25.1634 4.16669ZM25.1634 41.6667C15.9738 41.6667 8.49675 34.1896 8.49675 25C8.49675 15.8104 15.9738 8.33335 25.1634 8.33335C34.353 8.33335 41.8301 15.8104 41.8301 25C41.8301 34.1896 34.353 41.6667 25.1634 41.6667Z" fill="#C09D2A"/>
        <path d="M20.9949 28.3063L16.2053 23.525L13.2637 26.475L20.9991 34.1938L34.9699 20.2229L32.0241 17.2771L20.9949 28.3063Z" fill="#C09D2A"/>
        </svg> Saved`;
          document.getElementById("save1").disabled = false;
          document.getElementById("save1").classList.remove("disabled-button");

          document.getElementsByClassName("saveBtn").innerText = "Saved";
          for (var i = 0; i < saveBtns.length; i++) {
            saveBtns[i].innerText = "Saved";
            saveBtns[i].disabled = false;
            saveBtns[i].classList.remove("disabled-button");
          }
        } else {
          console.error("Failed to save Blob data on the server.");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
    // saveSetting();


  }else if (backElement2.checked) {
    console.log("Back is checked.");
    console.log("Get Back Json.");
    $.ajax({
      type: "GET",
      url: `/get-json/back?id=${id}`,
      success: function (response) {
        if (response) {
          if (response.data == null) {
            if (canv.backgroundImage == null) {
              var imageUrl = "https://clickadmin.searchmarketingservices.online/eventcards/1690902229.jpeg";
              // Load the background image onto the canvas
              fabric.Image.fromURL(imageUrl, function (img) {
                // Adjust the image size to fit the canvas
                img.scaleToWidth(canv.width);
                img.scaleToHeight(canv.height);
                canv.setBackgroundImage(img, canv.renderAll.bind(canv), {
                  // Set options as needed
                  originX: 'left',
                  originY: 'top'
                });
              });
            }

            if (!Array.isArray(canv._iTextInstances) || canv._iTextInstances.length === 0) {
              addGroom();
              addBride();
              addAnd();
              AddEvent();
              AddTime();
              AddPlace();
              AddCity();
            }
          }
        } else {
        }
        const file = response.data;
        fetch(`/Json/${file}`)
          .then((res) => {
            return res.json();
          })
          .then(function (data) {
            const jsonData = data;

            if (jsonData.objects.length == 1) {
              // Check if the canvas has no iText instances
              if (canv.backgroundImage == null) {
                var imageUrl = "https://clickadmin.searchmarketingservices.online/eventcards/1690902229.jpeg";
                // Load the background image onto the canvas
                fabric.Image.fromURL(imageUrl, function (img) {
                  // Adjust the image size to fit the canvas
                  img.scaleToWidth(canv.width);
                  img.scaleToHeight(canv.height);
                  canv.setBackgroundImage(img, canv.renderAll.bind(canv), {
                    // Set options as needed
                    originX: 'left',
                    originY: 'top'
                  });
                });
              }

              if (!Array.isArray(canv._iTextInstances) || canv._iTextInstances.length === 0) {
                addGroom();
                addBride();
                addAnd();
                AddEvent();
                AddTime();
                AddPlace();
                AddCity();
              }
            } else {
              canv.clear();
              canv.loadFromJSON(jsonData, function () {
                canv.requestRenderAll();
              });
            }

          });
      },
    });
  } else {
    console.log("Back is not checked.");

    document.getElementById("save1").innerHTML = `<svg width="41" height="40" viewBox="0 0 51 50" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M25.1634 4.16669C13.6759 4.16669 4.33008 13.5125 4.33008 25C4.33008 36.4875 13.6759 45.8334 25.1634 45.8334C36.6509 45.8334 45.9967 36.4875 45.9967 25C45.9967 13.5125 36.6509 4.16669 25.1634 4.16669ZM25.1634 41.6667C15.9738 41.6667 8.49675 34.1896 8.49675 25C8.49675 15.8104 15.9738 8.33335 25.1634 8.33335C34.353 8.33335 41.8301 15.8104 41.8301 25C41.8301 34.1896 34.353 41.6667 25.1634 41.6667Z" fill="#C09D2A"/>
  <path d="M20.9949 28.3063L16.2053 23.525L13.2637 26.475L20.9991 34.1938L34.9699 20.2229L32.0241 17.2771L20.9949 28.3063Z" fill="#C09D2A"/>
  </svg> Saving...`;
    document.getElementById("save1").classList.add("disabled-button");
    document.getElementById("save1").disabled = true;
    var saveBtns = document.getElementsByClassName("SaveBtn");
    for (var i = 0; i < saveBtns.length; i++) {
      saveBtns[i].innerText = "Saving...";
      saveBtns[i].classList.add("disabled-button");
      saveBtns[i].disabled = true;
    }
    const json = JSON.stringify(canv.toJSON());
    const dddd = canv.toDataURL({
      format: "png",
      multiplier: 1,
    });
    const blob = new Blob([json], { type: "application/json" });

    const formData = new FormData();
    var filename = window.location.pathname.split("/")[2] + ".json";
    formData.append("json_blob", [json]);
    formData.append("event_id", window.location.pathname.split("/")[2]);
    formData.append("_token", this.token);
    formData.append("data_url", dddd)

    fetch("/save-blob", {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        if (response.ok) {
          loadOldData2();
          document.getElementById("save1").innerHTML = `<svg width="41" height="40" viewBox="0 0 51 50" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M25.1634 4.16669C13.6759 4.16669 4.33008 13.5125 4.33008 25C4.33008 36.4875 13.6759 45.8334 25.1634 45.8334C36.6509 45.8334 45.9967 36.4875 45.9967 25C45.9967 13.5125 36.6509 4.16669 25.1634 4.16669ZM25.1634 41.6667C15.9738 41.6667 8.49675 34.1896 8.49675 25C8.49675 15.8104 15.9738 8.33335 25.1634 8.33335C34.353 8.33335 41.8301 15.8104 41.8301 25C41.8301 34.1896 34.353 41.6667 25.1634 41.6667Z" fill="#C09D2A"/>
        <path d="M20.9949 28.3063L16.2053 23.525L13.2637 26.475L20.9991 34.1938L34.9699 20.2229L32.0241 17.2771L20.9949 28.3063Z" fill="#C09D2A"/>
        </svg> Saved`;
          document.getElementById("save1").disabled = false;
          document.getElementById("save1").classList.remove("disabled-button");

          document.getElementsByClassName("saveBtn").innerText = "Saved";
          for (var i = 0; i < saveBtns.length; i++) {
            saveBtns[i].innerText = "Saved";
            saveBtns[i].disabled = false;
            saveBtns[i].classList.remove("disabled-button");
          }
        } else {
          console.error("Failed to save Blob data on the server.");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
    // saveSetting();

  }
}

// var imgDiv = document.getElementById('imgDiv');

// for (let i = 0; i < stickers1.length; i++) {
//   const colDiv = document.createElement('div');
//   colDiv.className = 'col-6 mb-3';

//   const img = document.createElement('img');
//   img.src = stickers1[i];
//   img.setAttribute('height', '200px');
//   img.setAttribute('width', '200px');
//   img.setAttribute('id', `img_${i}`);

//   img.addEventListener('click', (event) => {
//     const clickedImgSrc = event.target.src;
//     const clickedSticker = stickers1.find((sticker) => sticker === clickedImgSrc);
//     if (clickedSticker) {
//       addStickerToCanvas1(clickedSticker);
//     }
//   });

//   colDiv.appendChild(img);
//   imgDiv.appendChild(colDiv);
// }

function loadCardImagesFromDB(data) {
  const stickers1 = [];

  var imgDiv = document.getElementById("imgDiv");
  for (let i = 0; i < data.length; i++) {
    const colDiv = document.createElement("div");
    colDiv.className = "col-6 mb-3";

    const img = document.createElement("img");
    img.src =
      "https://clickadmin.searchmarketingservices.online/eventcards/" + data[i].img;
    img.setAttribute("height", "200px");
    img.setAttribute("width", "200px");
    img.setAttribute("id", `img_${i}`);
    img.style.zIndex = "-10";

    stickers1.push(img);
    img.addEventListener("click", (event) => {
      const clickedImgSrc = event.target.src;
      // Use the 'src' attribute for comparison
      const clickedSticker = stickers1.find(
        (sticker) => sticker.src === clickedImgSrc
      );
      if (clickedSticker) {
        addStickerToCanvas1(clickedSticker.src);
      }
    });

    colDiv.appendChild(img);
    imgDiv.appendChild(colDiv);
  }
}
for (let i = 0; i < stickers1.length; i++) {
  const colDiv = document.createElement("div");
  colDiv.className = "col-6 mb-3";
  const img = document.createElement("img");
  img.src = stickers1[i];
  img.setAttribute("height", "200px");
  img.setAttribute("width", "200px");
  img.setAttribute("id", `img_${i}`);
  img.style.zIndex = "-10";
  img.addEventListener("click", (event) => {
    const clickedImgSrc = event.target.src;
    const clickedSticker = stickers1.find(
      (sticker) => sticker === clickedImgSrc
    );
    if (clickedSticker) {
      addStickerToCanvas(clickedSticker);
    }
  });
  colDiv.appendChild(img);
  imgDiv.appendChild(colDiv);
}
// function addStickerToCanvas(sticker) {
//   fabric.Image.fromURL(sticker, (img) => {
//     img.set({
//       scaleX: canv.width / img.width,
//       scaleY: canv.height / img.height,
//     });
//     canv.setBackgroundImage(img, canv.renderAll.bind(canv));
//   }, { crossOrigin: 'Anonymous' });
// }

can.addEventListener("click", function () {
  sideshow.style.display = "none";
});

function addStickerToCanvas1(sticker) {
  fabric.Image.fromURL(
    sticker,
    (img) => {
      img.set({
        scaleX: canv.width / img.width,
        scaleY: canv.height / img.height,
      });
      canv.setBackgroundImage(img, canv.renderAll.bind(canv));
    },
    { crossOrigin: "Anonymous" }
  );
}

function GetAnimations() {
  $.ajax({
    type: "GET",
    url: "/get-animations",
    data: {
      id_event: window.location.pathname.split("/")[2]
    },
    success: function (response) {
      if (response) {
        if (response.card.two_sided == 1) {
          document.getElementById("two_sided").checked = true;
          document.getElementById("frontBackBox").style.display = "block";
          document.getElementById("frontBackBox2").style.display = "block";
        } else {
          document.getElementById("two_sided").checked = false;
          document.getElementById("frontBackBox").style.display = "none";
          document.getElementById("frontBackBox2").style.display = "none";
        }
        var HTML = document.getElementById("animationModalBody");
        HTML.innerHTML = "";
        response.data.forEach(element => {
          if (element.id_animation == 5) {
            HTML.innerHTML += ``
          } else {
            HTML.innerHTML += `
                <div class="col-md-4">
                    <label class="borderPc py-2" for="id_animation_${element.id_animation}">
                    <img src="/animations-images/${element.name_animation}.png" class="img-thumbnail" style="width: 100%; height: 100%;"
                    onclick="document.getElementById('radio_${element.id_animation}').click()">
                    <br />
                    ${element.name_animation}
                    </label>
                    <br />
                    <input type="radio" id="radio_${element.id_animation}" name="id_animation"
                        value="${element.id_animation}" ${element.id_animation == response.animation_id ? "checked" : ""}>
                </div>
                `;
          }
        });
      }
    },

    error: function (xhr, status, error) {
    }
  })
}

async function loadOldData2() {

  getTemplates();
  // Storing response
  const response = await fetch(
    "/event/get-card/" + window.location.pathname.split("/")[2]
  );

  //Get Animations 
  GetAnimations();

  // Storing data in form of JSON
  let res = await response.text();
  var data = JSON.parse(res);
  document.getElementById("colorPickerenvelope_innersetting").value = data.cardColorIn;
  document.getElementById("colorPickersetting").value = data.envTitleColor;
  document.getElementById("colorPickerenvelope_outsetting").value = data.cardColorOut;
  loadCardImagesFromDB(data.cardImgs);
  loadBgImagesFromDB(data.bgImgs);

  if (data.result != 0) {

    document.getElementById("id_card").value = data["id_card"];
    document.getElementById(
      "iframe"
    ).src = `${window.location.origin}/cardPreviewNew/${data["id_card"]}`;
    if (data.bgImgs.length > 0) {

      // document.getElementById(data.bgName).checked = true;
    }
    let rsvpData = data.rsvp.split(",");

    rsvpData.forEach((element, key) => {
      if (element == 1) {
        document.getElementById("flexCheckChecked" + (key + 1)).checked = true;
      } else {
        document.getElementById("flexCheckChecked" + (key + 1)).checked = false;
      }
    });

    document.getElementById("msgTitle").value = data.msgTitle;

    document.getElementById("deleteBtn").addEventListener("click", function () {
      const obj = canv.getActiveObject();
      if (obj) {
        canv.remove(obj);
        saveState();
      }
    });

    document
      .getElementById("downloadBtn3")
      .addEventListener("click", function () {
        const dataUrl = canv.toDataURL({
          format: "png",
          multiplier: 2, // Increase multiplier for higher resolution
        });
        const link = document.createElement("a");
        link.href = dataUrl;
        link.download = "canvas_image.png";
        link.click();
      });


    canv.on("selection:created", function (options) {
      updateControls(options.target);
    });

    canv.on("selection:updated", function (options) {
      updateControls(options.target);
    });



    if (data.bgImgs.length > 0) {
      // document.getElementById(data.bgName).checked = true;
    }


    document.getElementById("msgTitle").value = data.msgTitle;
  } else {
    if (data.isCouple == 0) {
      // document.getElementById("display-name1").innerHTML = "Name Here";
      // document.getElementById("name1").value = "Name Here";
    }
  }

  isCouple = data.isCouple;
  if (data.isCouple == 0) {
    //document.getElementById("name2").style.display = "none";
    //document.getElementById("name2label").style.display = "none";
  }

  stickerLoad(data.stickers);
}

function dwnPDF() {
  const dataUrl = canv.toDataURL({
    format: "png",
    multiplier: 2, // Increase multiplier for higher resolution
  });
  const link = document.createElement("a");
  link.href = dataUrl;
  link.download = "canvas_image.png";
  link.click();
}

// function loadBgImagesFromDB(imgData) {

//   let doc = document.getElementById("bgImgData");
//   if (imgData.length > 0) {
//     let tags = "";
//     for (let i = 0; i < imgData.length; i++) {
//       tags +=
//         "<label class='borderPc py-2' >" +
//         "<input type='radio' onclick='backgroundSelecetor(this.value)' name='test' class='bgName' value='" +
//         imgData[i].img +
//         "' id='" +
//         imgData[i].img +
//         "' >" +
//         "<img src='https://clickadmin.searchmarketingservices.online/eventcards/" +
//         imgData[i].img +
//         "' alt='Option 1'  style='z-index: -10'>" +
//         "</label>";
//     }
//     doc.innerHTML = tags;
//   } else {
//     doc.innerHTML = "";
//   }
// }
function loadBgImagesFromDB(imgData) {
  let selectedBackground;
  $.ajax({
    type: "GET",
    url: "/event/get-card/" + window.location.pathname.split("/")[2],
    success: function (data) {
      console.log("datass", data.bgName);
      selectedBackground = data.bgName;

      // After the background data is retrieved, render the images and set the selected one
      renderBgImages(imgData, selectedBackground);
    },
    error: function (xhr, status, error) {
      console.log(error);
    }
  });
}

function renderBgImages(imgData, selectedBackground) {
  let doc = document.getElementById("bgImgData");
  if (imgData.length > 0) {
    let tags = "";
    for (let i = 0; i < imgData.length; i++) {
      const isChecked = imgData[i].img === selectedBackground ? "checked" : "";
      tags +=
        "<label class='borderPc py-2'>" +
        "<input type='radio' onclick='backgroundSelecetor(this.value)' name='test' class='bgName' value='" +
        imgData[i].img +
        "' id='" +
        imgData[i].img +
        "' " + isChecked + ">" +
        "<img src='https://clickadmin.searchmarketingservices.online/eventcards/" +
        imgData[i].img +
        "' alt='Option 1' style='z-index: -10'>" +
        "</label>";
    }
    doc.innerHTML = tags;
  } else {
    doc.innerHTML = "";
  }
}

function updateCanvasHistory() {
  canvasHistory.push(canv.toJSON());
}
function addToHistory() {
  const jsonData = JSON.stringify(canv.toJSON());
  moveHistory = moveHistory.slice(0, currentIndex + 1); // Remove future history
  moveHistory.push(jsonData);
  if (moveHistory.length > 10) {
    moveHistory.shift();
  }
  currentIndex = moveHistory.length - 1;
}

function switchToOld() {
  window.location =
    "/event/" + window.location.pathname.split("/")[2] + "/invitation-old";
}


function clickONsticker() {
  if (event.target.tagName === "IMG") {
    const clickedImgSrc = event.target.src;

    const clickedSticker = stickers.find(
      (sticker) => sticker.src === clickedImgSrc
    );


    if (clickedSticker) {
      addStickerToCanvas(clickedSticker);
    } else {

      addStickerToCanvas(clickedImgSrc);
    }
  }
}

function closeSidebar() {
  var sidebar = document.querySelector('.sidebar');
  if (sidebar) {
    sidebar.style.display = "none";
  }
}


function addTemplate() {
  if (document.querySelector("#viewTemplates").style.display == "inline-block") {
    document.querySelector("#viewTemplates").style.display = "none";
  } else {
    document.querySelector("#viewTemplates").style.display = "inline-block";
  }
  // document.querySelector("#viewTemplates").style.display = "inline-block";
  document.querySelector(".sidebaraddimg").style.display = "none";
  document.querySelector(".sidebaraddtext").style.display = "none";
  document.querySelector("#sidebarbackgroundaddimg1").style.display = "none"

}

function saveAnimation() {
  var id_animation = document.querySelector('input[name="id_animation"]:checked').value;


  $.ajax({
    type: "POST",
    url: "/animation-save",
    data: JSON.stringify({
      _token: this.token,
      id_animation: id_animation,
      event_id: window.location.pathname.split("/")[2],
    }),
    dataType: "json",
    contentType: "application/json",
    success: function (msg) {

      GetAnimations();
    },
    error: function (xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");

    },
  });
}

// no of these 
function saveNoneOfThese() {
  $.ajax({
    type: "POST",
    url: "/animation-save",
    data: JSON.stringify({
      _token: this.token,
      id_animation: 5, // Set animation ID to 0
      event_id: window.location.pathname.split("/")[2],
    }),
    dataType: "json",
    contentType: "application/json",
    success: function (msg) {
      GetAnimations();
    },
    error: function (xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
    },
  });
}


function addGroom() {
  const text = "Groom";
  const font = document.querySelector(".fontSelector1").value;
  const textbox = new fabric.Textbox(text, {
    left: 100,
    top: 150,
    width: 100,
    fontFamily: 'arial',
    editable: true,
    selectionColor: 'rgba(0, 0, 0, 0.3)',
  });
  canv.add(textbox);
  saveState();
  saveAll();
  canv.requestRenderAll();
}

function addAnd() {
  const text = "&";
  const font = document.querySelector(".fontSelector1").value;
  const textbox = new fabric.Textbox(text, {
    left: 225,
    top: 150,
    width: 50,
    fontFamily: 'arial',
    editable: true,
    selectionColor: 'rgba(0, 0, 0, 0.3)',
  });
  canv.add(textbox);
  saveState();
  saveAll();
  canv.requestRenderAll();
}

function addBride() {
  const text = "Bride";
  const font = document.querySelector(".fontSelector1").value;
  const textbox = new fabric.Textbox(text, {
    left: 255,
    top: 150,
    width: 200,
    fontFamily: 'arial',
    editable: true,
    selectionColor: 'rgba(0, 0, 0, 0.3)',
  });
  canv.add(textbox);
  saveState();
  saveAll();
  canv.requestRenderAll();
}

function AddEvent() {
  const text = "IN OUR WEDDING";
  const font = document.querySelector(".fontSelector1").value;
  const textbox = new fabric.Textbox(text, {
    left: 100,
    top: 215,
    fontSize: 20,
    fontFamily: 'arial',
    textAlign: 'center',
    width: 200,
    editable: true,
    selectionColor: 'rgba(0, 0, 0, 0.3)',
  });

  canv.add(textbox);
  textbox.centerH();
  saveState();
  saveAll();
  canv.requestRenderAll();
}

function AddTime() {
  const text = "ONE O CLOCK IN THE AFTERNOON";
  const font = document.querySelector(".fontSelector1").value;
  const textbox = new fabric.Textbox(text, {
    left: 100,
    top: 270,
    fontSize: 13,
    fontFamily: 'arial',
    textAlign: 'center',
    width: 200,
    editable: true,
    selectionColor: 'rgba(0, 0, 0, 0.3)',
  });

  canv.add(textbox);
  textbox.centerH();
  saveState();
  saveAll();
  canv.requestRenderAll();
}

function AddPlace() {
  const text = "WHITE CHURCH";
  const font = document.querySelector(".fontSelector1").value;
  const textbox = new fabric.Textbox(text, {
    left: 100,
    top: 320,
    fontSize: 13,
    fontFamily: 'arial',
    textAlign: 'center',
    width: 200,
    editable: true,
    selectionColor: 'rgba(0, 0, 0, 0.3)',
  });

  canv.add(textbox);
  textbox.centerH();
  saveState();
  saveAll();
  canv.requestRenderAll();
}

function AddCity() {
  const text = "YOUR CITY GOES HERE";
  const font = document.querySelector(".fontSelector1").value;
  const textbox = new fabric.Textbox(text, {
    left: 100,
    top: 350,
    fontSize: 13,
    fontFamily: 'arial',
    textAlign: 'center',
    width: 200,
    editable: true,
    selectionColor: 'rgba(0, 0, 0, 0.3)',
  });

  canv.add(textbox);
  textbox.centerH();
  saveState();
  saveAll();
  canv.requestRenderAll();
}


//UNDO

function saveState() {
  var currentState = JSON.stringify(canv.toJSON(['selectable', 'evented'])); // Save canvas state
  if (currentIndex < undoStack.length - 1) {
    undoStack.splice(currentIndex + 1, undoStack.length - currentIndex - 1); // Clear redo states
  }
  undoStack.push(currentState);
  if (undoStack.length > maxUndoStackSize) {
    undoStack.shift(); // Remove oldest state if stack size exceeds limit
  }
  currentIndex = undoStack.length - 1; // Update current index
  redoStack = []; // Clear redo stack
}

function undo() {
  if (currentIndex > 0) {
    currentIndex--;
    loadCanvasState();
  }
}

function redo() {
  if (currentIndex < undoStack.length - 1) {
    currentIndex++;
    loadCanvasState();
  }
}

function loadCanvasState() {
  var state = JSON.parse(undoStack[currentIndex]);
  canv.loadFromJSON(state, function () {
    canv.renderAll();
  });
}

function toggleTwoSided(element) {
  if (element.checked === true) {
    document.getElementById("frontBackBox").style.display = "block";
    document.getElementById("frontBackBox2").style.display = "block";
  } else {
    document.getElementById("back").checked = false;

    console.log("unchecked two sided");
    handleJSONImport();
    document.getElementById("frontBackBox").style.display = "none";
    document.getElementById("frontBackBox2").style.display = "none";
  }
  var formData = new FormData();
  formData.append('_token', this.token);
  formData.append('two_sided', element.checked ? 1 : 0);
  formData.append('id_event', window.location.pathname.split("/")[2]);
  $.ajax({
    type: "POST",
    url: "/toggle-two-sided",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      console.log(response.message);
      Swal.fire({
        icon: 'success',
        title: response.message,
        showConfirmButton: false,
        timer: 1500
      })
    },
    error: function (xhr, status, error) {
      console.error("Error:", error);
      Swal.fire({
        icon: 'error',
        title: 'Error updating two sided',
        text: 'Something went wrong. Please try again.',
      })
    },
  });

}

function toggleSide(element) {
  if (element.id === 'front') {
    // Add logic for editing the front side
    console.log('Editing Front');
    handleJSONImport();
  } else if (element.id === 'front2') {
    // Add logic for editing the front side
    console.log('Editing Front');
    handleJSONImport();
  } else if (element.id === 'back') {
    console.log('Editing Back');
    // Add logic for editing the back side
    handleJSONImport();
  } else if (element.id === 'back2') {
    console.log('Editing Back');
    // Add logic for editing the back side
    handleJSONImport();
  }
}