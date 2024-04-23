"use strict";

const qualified = document.querySelector('#qualified');
const nonqualified = document.querySelector('#nonqualified');
const roth = document.querySelector('#roth');
//const costbasis1 = document.querySelector('#costbasis1');
//const costbasis2 = document.querySelector('#costbasis2');
//const taxreturns = document.querySelector('#taxreturns');

//qualified.addEventListener("input", hideCostBasis);
//nonqualified.addEventListener("input", showCostBasis);
//roth.addEventListener("input", hideCostBasis);
taxreturn1.addEventListener("change", function() {checkFileSize1(taxreturn1);});
taxreturn2.addEventListener("change", function() {checkFileSize2(taxreturn2);});

/*
function showCostBasis() {
 costbasis1.style.display = 'table-cell';
 costbasis2.style.display = 'table-cell';   
}

function hideCostBasis() {
 costbasis1.style.display = 'none';
 costbasis2.style.display = 'none';   
}
*/

      function checkFileSize1(taxreturn1) {
            
            // Check if any file is selected.
            if (taxreturn1.files.length > 0) {
                for (let i = 0; i <= taxreturn1.files.length - 1; i++) {
 
                    let filesizebytes = taxreturn1.files.item(i).size;
                    const filesizembs = (filesizebytes/1024).toFixed(2);
                    // The size of the file.
                    if (filesizebytes >= 50000000) {
                        alert(
        "The file size is too big, please select a file less than 5MB");
                    }  else {
                        document.getElementById('size1').innerHTML = 
                          '<b>'+ (filesizembs/1000).toFixed(1) + '</b> MB';
                    }
                }
            }
        }

    function checkFileSize2(taxreturn2) {
            
            // Check if any file is selected.
            if (taxreturn2.files.length > 0) {
                for (let i = 0; i <= taxreturn2.files.length - 1; i++) {
 
                    let filesizebytes = taxreturn2.files.item(i).size;
                    const filesizembs = (filesizebytes/1024).toFixed(2);
                    // The size of the file.
                    if (filesizebytes >= 50000000) {
                        alert(
        "The file size is too big, please select a file less than 5MB");
                    }  else {
                        document.getElementById('size2').innerHTML = 
                          '<b>'+ (filesizembs/1000).toFixed(1) + '</b> MB';
                    }
                }
            }
        }