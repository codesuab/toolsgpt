var e=[],t={quality:.75,scale:1,format:`original`},n=document.getElementById(`dropZone`),r=document.getElementById(`fileInput`),i=document.getElementById(`queueContainer`),a=document.getElementById(`fileQueue`),o=document.getElementById(`clearAllBtn`),s=document.getElementById(`downloadZipBtn`),c=document.getElementById(`qualityRange`),l=document.getElementById(`qualityVal`),u=document.getElementById(`scaleRange`),d=document.getElementById(`scaleVal`),f=document.getElementById(`formatSelector`),p=document.getElementById(`reapplyBtn`),m=document.getElementById(`batchCountText`),h=document.getElementById(`totalSavingsPercent`),g=document.getElementById(`totalOriginalSize`),_=document.getElementById(`totalCompressedSize`),v=document.getElementById(`totalSavedAmount`),y=document.getElementById(`queueBadge`);c.addEventListener(`input`,e=>{let n=e.target.value;l.textContent=`${n}%`,t.quality=n/100,b()}),u.addEventListener(`input`,e=>{let n=e.target.value;d.textContent=`${n}%`,t.scale=n/100}),f.addEventListener(`change`,e=>{t.format=e.target.value});function b(){let e=document.getElementById(`presetEco`),n=document.getElementById(`presetBalanced`),r=document.getElementById(`presetLossless`),i=Math.round(t.quality*100),a=Math.round(t.scale*100);[e,n,r].forEach(e=>{e.className=`py-2.5 px-2 bg-slate-50 hover:bg-slate-100 border border-slate-200 text-slate-700 text-xs font-medium rounded-xl transition-all duration-150 focus:outline-none flex flex-col items-center justify-center gap-1`}),i===55&&a===85?e.className=`py-2.5 px-2 bg-brand-primary border border-brand-primary text-white text-xs font-bold rounded-xl transition-all duration-150 focus:outline-none flex flex-col items-center justify-center gap-1 shadow-md shadow-brand-primary/10`:i===75&&a===100?n.className=`py-2.5 px-2 bg-brand-primary border border-brand-primary text-white text-xs font-bold rounded-xl transition-all duration-150 focus:outline-none flex flex-col items-center justify-center gap-1 shadow-md shadow-brand-primary/10`:i===95&&a===100&&(r.className=`py-2.5 px-2 bg-brand-primary border border-brand-primary text-white text-xs font-bold rounded-xl transition-all duration-150 focus:outline-none flex flex-col items-center justify-center gap-1 shadow-md shadow-brand-primary/10`)}n.addEventListener(`click`,()=>r.click()),n.addEventListener(`dragover`,e=>{e.preventDefault(),n.classList.add(`border-brand-primary`,`bg-slate-50`)}),n.addEventListener(`dragleave`,()=>{n.classList.remove(`border-brand-primary`,`bg-slate-50`)}),n.addEventListener(`drop`,e=>{e.preventDefault(),n.classList.remove(`border-brand-primary`,`bg-slate-50`);let t=e.dataTransfer.files;t.length>0&&S(t)}),r.addEventListener(`change`,e=>{let t=e.target.files;t.length>0&&S(t),r.value=``});function x(e,t=2){if(e===0)return`0 Bytes`;let n=1024,r=t<0?0:t,i=[`Bytes`,`KB`,`MB`,`GB`],a=Math.floor(Math.log(e)/Math.log(n));return parseFloat((e/n**a).toFixed(r))+` `+i[a]}function S(n){i.classList.remove(`hidden`),Array.from(n).forEach(n=>{if(!n.type.match(`image.*`)){V(`Invalid File Type`,`File "${n.name}" is not a recognized image.`,`error`);return}let r={id:`img_`+Date.now()+`_`+Math.random().toString(36).substring(2,9),name:n.name,originalSize:n.size,type:n.type,status:`pending`,quality:t.quality,scale:t.scale,format:t.format,originalFile:n,originalUrl:URL.createObjectURL(n),compressedBlob:null,compressedUrl:null,compressedSize:0,savingsPercent:0,width:0,height:0,newWidth:0,newHeight:0};e.push(r),C(r),w(r)}),O(),V(`Files Added`,`${n.length} images added to your queue.`,`info`)}function C(e){let t=`
                <div id="${e.id}" class="bg-white border border-slate-200 hover:border-slate-300 rounded-xl p-4 flex flex-col sm:flex-row items-center justify-between gap-4 transition-all relative overflow-hidden group">
                    
                    <!-- Compression status strip (left border indicator) -->
                    <div class="status-strip absolute top-0 bottom-0 left-0 w-1.5 bg-amber-500"></div>

                    <div class="flex items-center space-x-3 w-full sm:w-auto">
                        <!-- Preview Thumbnail -->
                        <div class="relative w-14 h-14 bg-slate-50 rounded-lg overflow-hidden border border-slate-200 shrink-0 flex items-center justify-center cursor-pointer" onclick="openComparison('${e.id}')">
                            <img src="${e.originalUrl}" class="w-full h-full object-cover" alt="preview">
                            <div class="absolute inset-0 bg-slate-900/10 opacity-0 group-hover:opacity-100 flex items-center justify-center text-slate-800 transition-opacity">
                                <i data-lucide="eye" class="w-4 h-4 bg-white/90 p-1 rounded-md shadow-sm"></i>
                            </div>
                        </div>

                        <!-- Info Metadata -->
                        <div class="min-w-0 grow">
                            <p class="font-bold text-slate-800 text-sm truncate max-w-45 sm:max-w-55" title="${e.name}">${e.name}</p>
                            <p class="text-xs text-slate-500 mt-1 flex items-center gap-1.5 flex-wrap">
                                <span class="original-size-badge font-semibold text-slate-600">${x(e.originalSize)}</span>
                                <span class="res-badge text-[10px] bg-slate-100 px-1.5 py-0.5 rounded text-slate-500 border border-slate-200/50">Loading dimensions...</span>
                            </p>
                        </div>
                    </div>

                    <!-- Process Info / Metrics -->
                    <div class="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto justify-between sm:justify-end">
                        
                        <!-- Status indicator / Details -->
                        <div class="text-center sm:text-right grow sm:grow-0">
                            <div class="status-text text-xs text-amber-600 font-semibold flex items-center justify-center sm:justify-end gap-1">
                                <span class="inline-block w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                                Processing...
                            </div>
                            <div class="savings-data text-xs font-bold text-emerald-600 mt-1 hidden">
                                Saved 0% (0 KB)
                            </div>
                        </div>

                        <!-- Interactive Buttons -->
                        <div class="flex items-center space-x-2 w-full sm:w-auto justify-end border-t border-slate-100 sm:border-0 pt-3 sm:pt-0">
                            <button onclick="openComparison('${e.id}')" class="compare-btn p-2 text-slate-500 hover:text-slate-800 bg-slate-50 hover:bg-slate-100 rounded-lg border border-slate-200 transition-colors disabled:opacity-50" disabled title="Compare original and compressed visual differences">
                                <i data-lucide="split" class="w-4 h-4"></i>
                            </button>
                            <a id="download_${e.id}" href="#" download="compressed_${e.name}" class="download-btn p-2 text-white bg-brand-primary hover:bg-brand-primaryHover rounded-lg shadow-sm transition-colors pointer-events-none opacity-50" title="Download compressed output">
                                <i data-lucide="download" class="w-4 h-4"></i>
                            </a>
                            <button onclick="removeQueueItem('${e.id}')" class="p-2 text-slate-500 hover:text-rose-600 bg-slate-50 hover:bg-rose-50 rounded-lg border border-slate-200 hover:border-rose-200 transition-all" title="Remove image from queue">
                                <i data-lucide="x" class="w-4 h-4"></i>
                            </button>
                        </div>

                    </div>
                </div>
            `;a.insertAdjacentHTML(`beforeend`,t),lucide.createIcons()}function w(e){let t=document.getElementById(e.id),n=t.querySelector(`.status-strip`),r=t.querySelector(`.status-text`),i=t.querySelector(`.savings-data`),a=t.querySelector(`.res-badge`),o=t.querySelector(`.compare-btn`),s=document.getElementById(`download_${e.id}`),c=new Image;c.src=e.originalUrl,c.onload=function(){e.width=c.naturalWidth,e.height=c.naturalHeight,a.textContent=`${c.naturalWidth} x ${c.naturalHeight}`;let l=c.naturalWidth*e.scale,u=c.naturalHeight*e.scale;e.newWidth=Math.round(l),e.newHeight=Math.round(u);let d=document.createElement(`canvas`),f=d.getContext(`2d`);d.width=e.newWidth,d.height=e.newHeight,f.drawImage(c,0,0,e.newWidth,e.newHeight);let p=e.type;e.format!==`original`&&(p=e.format),d.toBlob(c=>{if(!c){T(e,t,`Engine failed to initialize Canvas stream.`);return}e.compressedBlob=c,e.compressedUrl=URL.createObjectURL(c),e.compressedSize=c.size,e.status=`done`;let l=e.originalSize,u=l-e.compressedSize,d=Math.max(0,Math.round(u/l*100));e.savingsPercent=d,n.className=`status-strip absolute top-0 bottom-0 left-0 w-1.5 bg-emerald-500`,r.className=`status-text text-xs text-emerald-600 font-bold flex items-center justify-center sm:justify-end gap-1`,r.innerHTML=`
                        <i data-lucide="check" class="w-4 h-4 text-emerald-600"></i>
                        Optimized
                    `,i.textContent=`Saved ${d}% (${x(u)})`,i.classList.remove(`hidden`),a.innerHTML=`
                        <span class="text-slate-400 line-through">${e.width}x${e.height}</span>
                        <i data-lucide="arrow-right" class="w-3 h-3 inline text-slate-400 mx-0.5"></i>
                        <span class="text-emerald-600 font-semibold">${e.newWidth}x${e.newHeight}</span>
                    `,o.disabled=!1,o.classList.remove(`opacity-50`),s.classList.remove(`pointer-events-none`,`opacity-50`),s.href=e.compressedUrl,s.download=`optimized_${E(e.name)}.${D(p)}`,lucide.createIcons(),O()},p,e.quality)},c.onerror=function(){T(e,t,`Could not decode image structure.`)}}function T(e,t,n){e.status=`error`;let r=t.querySelector(`.status-strip`),i=t.querySelector(`.status-text`);r.className=`status-strip absolute top-0 bottom-0 left-0 w-1.5 bg-rose-500`,i.className=`status-text text-xs text-rose-600 font-semibold flex items-center justify-center sm:justify-end gap-1`,i.innerHTML=`
                <i data-lucide="alert-circle" class="w-4 h-4"></i>
                Error: ${n}
            `,lucide.createIcons(),O(),V(`Compression Error`,`Failed to compress file: ${e.name}`,`error`)}function E(e){return e.substring(0,e.lastIndexOf(`.`))||e}function D(e){switch(e){case`image/jpeg`:return`jpg`;case`image/png`:return`png`;case`image/webp`:return`webp`;default:return`jpg`}}p.addEventListener(`click`,()=>{if(e.length===0){V(`Queue Empty`,`Upload images first before applying adjustments.`,`warning`);return}V(`Reprocessing`,`Applying new settings to your image queue...`,`info`),e.forEach(e=>{e.quality=t.quality,e.scale=t.scale,e.format=t.format,e.status=`pending`;let n=document.getElementById(e.id);if(n){n.querySelector(`.status-strip`).className=`status-strip absolute top-0 bottom-0 left-0 w-1.5 bg-amber-500`;let e=n.querySelector(`.status-text`);e.className=`status-text text-xs text-amber-600 font-semibold flex items-center justify-center sm:justify-end gap-1`,e.innerHTML=`
                        <span class="inline-block w-2 h-2 rounded-full bg-amber-500 animate-pulse animate-duration-1000"></span>
                        Re-optimizing...
                    `,n.querySelector(`.savings-data`).classList.add(`hidden`),n.querySelector(`.compare-btn`).disabled=!0,n.querySelector(`.download-btn`).classList.add(`pointer-events-none`,`opacity-50`)}w(e)}),O()});function O(){if(e.length===0)return;let t=0,n=0,r=0;e.forEach(e=>{t+=e.originalSize,e.status===`done`&&e.compressedSize?(n+=e.compressedSize,r++):n+=e.originalSize});let i=t-n,a=t>0?Math.max(0,Math.round(i/t*100)):0;m.textContent=`${e.length} File${e.length>1?`s`:``} loaded`,y.textContent=e.length,g.textContent=x(t),_.textContent=x(n),v.textContent=x(Math.max(0,i)),h.textContent=`Saving: ${a}%`}o.addEventListener(`click`,()=>{e.forEach(e=>{e.originalUrl&&URL.revokeObjectURL(e.originalUrl),e.compressedUrl&&URL.revokeObjectURL(e.compressedUrl)}),e=[],a.innerHTML=``,i.classList.add(`hidden`),V(`Queue Cleared`,`All images and temporary caches have been released.`,`info`)}),s.addEventListener(`click`,async()=>{let t=e.filter(e=>e.status===`done`);if(t.length===0){V(`Nothing to Export`,`Please wait until at least one compression is ready.`,`warning`);return}s.disabled=!0;let n=s.innerHTML;s.innerHTML=`
                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Assembling ZIP...</span>
            `;try{let e=new JSZip;t.forEach(t=>{let n=t.format===`original`?t.type:t.format,r=`optimized_${E(t.name)}.${D(n)}`;e.file(r,t.compressedBlob)});let n=await e.generateAsync({type:`blob`}),r=URL.createObjectURL(n),i=document.createElement(`a`);i.href=r,i.download=`OptiSqueeze_Batch_${Date.now()}.zip`,document.body.appendChild(i),i.click(),document.body.removeChild(i),URL.revokeObjectURL(r),V(`ZIP Saved`,`Successfully exported ${t.length} files.`,`success`)}catch(e){console.error(e),V(`Export Error`,`An error occurred while compiling your ZIP package.`,`error`)}finally{s.disabled=!1,s.innerHTML=n}});var k=document.getElementById(`compareModal`),A=document.getElementById(`closeCompareBtn`),j=document.getElementById(`imgOriginal`),M=document.getElementById(`imgCompressed`),N=document.getElementById(`compressedOverlay`),P=document.getElementById(`sliderHandle`),F=document.getElementById(`comparisonContainer`);document.getElementById(`compareTitle`),document.getElementById(`comparisonStatsText`);var I=document.getElementById(`downloadCompBtn`);document.getElementById(`labelOrigSize`),document.getElementById(`labelCompSize`),document.getElementById(`labelSavings`);var L=!1,R=null;function z(){let e=j.getBoundingClientRect();M.style.width=`${e.width}px`,M.style.height=`${e.height}px`}window.addEventListener(`resize`,()=>{k.classList.contains(`hidden`)||z()}),A.addEventListener(`click`,()=>{k.classList.add(`hidden`),document.body.classList.remove(`overflow-hidden`),R=null});function B(e){let t=F.getBoundingClientRect(),n=j.getBoundingClientRect(),r=(e-(t.left+(t.width-n.width)/2))/n.width*100;r<0&&(r=0),r>100&&(r=100),N.style.width=`${r}%`;let i=(e-t.left)/t.width*100,a=Math.max((n.left-t.left)/t.width*100,Math.min((n.right-t.left)/t.width*100,i));P.style.left=`${a}%`}P.addEventListener(`mousedown`,()=>{L=!0}),window.addEventListener(`mousemove`,e=>{L&&B(e.clientX)}),window.addEventListener(`mouseup`,()=>{L=!1}),P.addEventListener(`touchstart`,()=>{L=!0}),window.addEventListener(`touchmove`,e=>{L&&e.touches&&e.touches[0]&&B(e.touches[0].clientX)}),window.addEventListener(`touchend`,()=>{L=!1}),I.addEventListener(`click`,()=>{if(!R)return;let t=e.find(e=>e.id===R);if(t){let e=t.format===`original`?t.type:t.format,n=document.createElement(`a`);n.href=t.compressedUrl,n.download=`optimized_${E(t.name)}.${D(e)}`,document.body.appendChild(n),n.click(),document.body.removeChild(n)}});function V(e,t,n=`info`){let r=document.getElementById(`toastContainer`),i=`toast_`+Date.now(),a=`text-indigo-500`,o=`info`,s=`border-slate-200`;n===`success`?(a=`text-emerald-500`,o=`check-circle`,s=`border-emerald-200`):n===`error`?(a=`text-rose-500`,o=`alert-triangle`,s=`border-rose-200`):n===`warning`&&(a=`text-amber-500`,o=`alert-circle`,s=`border-amber-200`);let c=`
                <div id="${i}" class="pointer-events-auto w-full bg-white border ${s} rounded-xl p-4 flex gap-3 shadow-lg transition-all duration-300 translate-y-2 opacity-0">
                    <div class="${a} shrink-0">
                        <i data-lucide="${o}" class="w-5 h-5"></i>
                    </div>
                    <div class="grow">
                        <h5 class="text-xs font-bold text-slate-800">${e}</h5>
                        <p class="text-xs text-slate-500 mt-1">${t}</p>
                    </div>
                    <button onclick="dismissToast('${i}')" class="text-slate-400 hover:text-slate-600 shrink-0">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
                </div>
            `;r.insertAdjacentHTML(`beforeend`,c),lucide.createIcons();let l=document.getElementById(i);requestAnimationFrame(()=>{l.classList.remove(`translate-y-2`,`opacity-0`)}),setTimeout(()=>{H(i)},4500)}function H(e){let t=document.getElementById(e);t&&(t.classList.add(`opacity-0`,`scale-95`),setTimeout(()=>{t.remove()},300))}