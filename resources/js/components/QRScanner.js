import { QrScanner } from '../app';
import { Modal } from 'flowbite';

const scanQrButton = document.querySelector('#scan-qr-button');
const closeQrButton = document.querySelector('#close-qr-modal');
const popUp = document.querySelector('#scan-qr-modal');
const qrForm = document.querySelector('#qr-form');
const videoElem = document.querySelector('#qr-video');
const subscriberName = document.querySelector('#modal-fullname');
const userId = document.querySelector('#modal-user-id');
if (popUp) {
    function setResult(result) {
        if(result) {
            scanner.stop();
        }
    
        const data = JSON.parse(result.data);
    
        userId.value = data.user_id;
        subscriberName.innerText = data.full_name;
    
        qrForm.submit();
    }
    
    const scanner = new QrScanner(videoElem, result => setResult(result), {
        onDecodeError: error => {
            console.log(error);
        },
        highlightScanRegion: true,
        highlightCodeOutline: true,
        preferredCamera: 'user',
        maxScansPerSecond: 10, 
    });
    
    const options = {
        onHide: () => {
            scanner.stop();
            resetModal();
        },
        onShow: () => {
            resetModal();
            scanner.start();
        },
    };
    const instanceOptions = {
        id: 'scan-qr-modal',
        override: true
    };
    
    const modal = new Modal(popUp, options, instanceOptions);
    
    function resetModal() {
        userId.value = '';
        subscriberName.innerText = '';
    }
    
    scanQrButton.addEventListener('click', () => {
       modal.show(); 
    });
    closeQrButton.addEventListener('click', () => {
       modal.hide(); 
    });
}