import{r as e}from"./app-_JzEb3ZB.js";import{t}from"./count-DoREMS0X.js";import{t as n}from"./jszip.min-Cks8Mhr4.js";var r=e(n(),1),i=document.getElementById(`drop-zone`),a=document.getElementById(`file-input`),o=document.getElementById(`browse-btn`),s=document.getElementById(`file-list`),c=document.getElementById(`file-list-container`),l=document.getElementById(`empty-state`),u=document.getElementById(`convert-all`),d=document.getElementById(`clear-all`),f=document.getElementById(`file-count`),p=document.getElementById(`result-section`),m=document.getElementById(`download-zip`),h=[];i.addEventListener(`dragover`,e=>{e.preventDefault(),i.classList.add(`drag-over`)}),i.addEventListener(`dragleave`,()=>i.classList.remove(`drag-over`)),i.addEventListener(`drop`,e=>{e.preventDefault(),i.classList.remove(`drag-over`),g(e.dataTransfer.files)}),o.addEventListener(`click`,()=>a.click()),a.addEventListener(`change`,e=>g(e.target.files)),d.addEventListener(`click`,v),u.addEventListener(`click`,y),m.addEventListener(`click`,x);function g(e){Array.from(e).forEach(e=>{if(e.type===`image/png`){let t=Date.now()+Math.random();h.push({id:t,file:e,quality:.8,status:`pending`,url:null})}}),_()}function _(){if(h.length===0){c.classList.add(`hidden`),l.classList.remove(`hidden`),p.classList.add(`hidden`);return}c.classList.remove(`hidden`),l.classList.add(`hidden`),f.textContent=h.length,s.innerHTML=``,h.forEach(e=>{let t=document.createElement(`div`);t.className=`flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-3 border border-[#e2e8f0] bg-[#f8fafc]`,t.innerHTML=`
                    <div class='flex items-center gap-4'>            
                        <div class="w-12 h-12 bg-gray-200 shrink-0 flex items-center justify-center overflow-hidden">
                            <span class="text-xs text-gray-500">PNG</span>
                        </div>
                        <div class="grow">
                            <p class="text-sm font-medium truncate w-48">${e.file.name}</p>
                            <p class="text-xs text-brand-muted">${(e.file.size/1024).toFixed(1)} KB</p>
                        </div>
                    </div>
                    <div class='flex gap-3 items-center justify-end'>
                        <div class="flex items-center gap-2">
                            <label class="text-xs text-brand-muted">Quality</label>
                            <select class="text-sm border border-brand-border px-2 py-1" onchange="updateQuality(${e.id}, this.value)">
                                <option value="0.9" ${e.quality==.9?`selected`:``}>High</option>
                                <option value="0.8" ${e.quality==.8?`selected`:``}>Medium</option>
                                <option value="0.5" ${e.quality==.5?`selected`:``}>Low</option>
                            </select>
                        </div>
                        <div class='flex items-center gap-2'>
                            <div class="text-right leading-0">
                                ${e.status===`done`?`<span class="text-green-600 text-xs font-semibold">Ready</span>`:`<span class="text-gray-500 text-xs">Pending</span>`}
                            </div>
                            <button class="text-brand-muted hover:text-[#ef4444]" onclick="removeFile(${e.id})">
                                <i class="ti ti-trash"></i>
                            </button>
                        </div>
                    </div>
                `,s.appendChild(t)})}function v(){h=[],_()}async function y(){u.disabled=!0,u.textContent=`Processing...`;for(let e of h)if(e.status!==`done`)try{e.url=await b(e.file,e.quality),e.status=`done`}catch{e.status=`error`}_(),u.disabled=!1,u.textContent=`Convert All`,p.classList.remove(`hidden`)}function b(e,t){return new Promise((n,r)=>{let i=new Image,a=new FileReader;a.onload=e=>{i.onload=()=>{let e=document.createElement(`canvas`);e.width=i.width,e.height=i.height;let r=e.getContext(`2d`);r.fillStyle=`#FFFFFF`,r.fillRect(0,0,e.width,e.height),r.drawImage(i,0,0),n(e.toDataURL(`image/jpeg`,t))},i.src=e.target.result},a.readAsDataURL(e)})}async function x(){let e=new r.default;h.forEach(t=>{if(t.url){let n=t.url.split(`,`)[1];e.file(t.file.name.replace(`.png`,`.jpg`),n,{base64:!0})}});let n=await e.generateAsync({type:`blob`}),i=document.createElement(`a`);i.href=URL.createObjectURL(n),i.download=`converted_images.zip`,i.click(),t(`png-to-jpg`)}