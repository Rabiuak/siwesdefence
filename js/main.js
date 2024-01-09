const APP_ID = "ac8ee879ad294e5b81adc0ea555364f2"
const TOKEN = "007eJxTYBAS8G6ucFBYG/HSdW1Pg3kAz8kA+w2cHBuXJO/etkEha74CQ2KyRWqqhbllYoqRpUmqaZKFYWJKskFqoqmpqbGZSZpR4585qQ2BjAyHFUyZGBkgEMRnZQgqSU3OYGAAAMKEHgc="
const CHANNEL = "Rtech"

const client = AgoraRTC.createClient({mode:'rtc', codec:'vp8'})

let localTracks = []
let remoteUsers = {}

let joinAndDisplayLocalStream = async () => {

    client.on('user-published', handleUserJoined)
    
    client.on('user-left', handleUserLeft)
    
    let UID = await client.join(APP_ID, CHANNEL, TOKEN, null)

    localTracks = await AgoraRTC.createMicrophoneAndCameraTracks() 

    let player = `<div class="video-container" id="user-container-${UID}">
                        <div class="video-player" id="user-${UID}"></div>
                  </div>`
    document.getElementById('video-streams').insertAdjacentHTML('beforeend', player)

    localTracks[1].play(`user-${UID}`)
    
    await client.publish([localTracks[0], localTracks[1]])
}

let joinStream = async () => {
    await joinAndDisplayLocalStream()
    document.getElementById('join-btn').style.display = 'none'
    document.getElementById('stream-controls').style.display = 'flex'
}

let handleUserJoined = async (user, mediaType) => {
    remoteUsers[user.uid] = user 
    await client.subscribe(user, mediaType)

    if (mediaType === 'video'){
        let player = document.getElementById(`user-container-${user.uid}`)
        if (player != null){
            player.remove()
        }

        player = `<div class="video-container" id="user-container-${user.uid}">
                        <div class="video-player" id="user-${user.uid}"></div> 
                 </div>`
        document.getElementById('video-streams').insertAdjacentHTML('beforeend', player)

        user.videoTrack.play(`user-${user.uid}`)
    }

    if (mediaType === 'audio'){
        user.audioTrack.play()
    }
}

let handleUserLeft = async (user) => {
    delete remoteUsers[user.uid]
    document.getElementById(`user-container-${user.uid}`).remove()
}

let leaveAndRemoveLocalStream = async () => {
    for(let i = 0; localTracks.length > i; i++){
        localTracks[i].stop()
        localTracks[i].close()
    }

    await client.leave()
    document.getElementById('join-btn').style.display = 'block'
    document.getElementById('stream-controls').style.display = 'none'
    document.getElementById('video-streams').innerHTML = ''
}

let toggleMic = async (e) => {
    if (localTracks[0].muted){
        await localTracks[0].setMuted(false)
        e.target.innerText = 'Mic on'
        e.target.style.backgroundColor = 'cadetblue'
    }else{
        await localTracks[0].setMuted(true)
        e.target.innerText = 'Mic off'
        e.target.style.backgroundColor = '#EE4B2B'
    }
}

let toggleCamera = async (e) => {
    if(localTracks[1].muted){
        await localTracks[1].setMuted(false)
        e.target.innerText = 'Camera on'
        e.target.style.backgroundColor = 'cadetblue'
    }else{
        await localTracks[1].setMuted(true)
        e.target.innerText = 'Camera off'
        e.target.style.backgroundColor = '#EE4B2B'
    }
}

document.getElementById('join-btn').addEventListener('click', joinStream)
document.getElementById('leave-btn').addEventListener('click', leaveAndRemoveLocalStream)
document.getElementById('mic-btn').addEventListener('click', toggleMic)
document.getElementById('camera-btn').addEventListener('click', toggleCamera)



// ======================Welcome======================
window.onload=function() {
    alert("Welcome to Department Software Engineering, SIWES Defence");
}



// ======================Student Gradind======================
 function calculateSum() {
            // Get all input elements with class 'number-input'
            const numberInputs = document.querySelectorAll('.number-input');

            // Calculate the sum of entered numbers
            const sum = Array.from(numberInputs)
                .map(input => parseFloat(input.value) || 0) // Convert input values to numbers
                .reduce((total, num) => total + num, 0);

            // Update the 'sum' input with the calculated sum
            document.getElementById('sum').value = sum;
            document.getElementById('sumDisplay').textContent = `Sum: ${sum}`;



            if (sum >= 70) {
                document.getElementById('gradeDisplay').textContent = `Grade : A`;
                document.getElementById('grade').value = ` A`;
            }else if (sum >= 60) {
                document.getElementById('gradeDisplay').textContent = `Grade : B`;
                document.getElementById('grade').value = ` B`;
            }else if (sum >= 50) {
                document.getElementById('gradeDisplay').textContent = `Grade : C`;
                document.getElementById('grade').value = ` C`;
            }else if (sum >= 45) {
                document.getElementById('gradeDisplay').textContent = `Grade : D`;
                document.getElementById('grade').value = ` D`;
            }else if (sum >= 39) {
                document.getElementById('gradeDisplay').textContent = `Grade : E`;
                document.getElementById('grade').value = ` E`;
            }else{
                document.getElementById('gradeDisplay').textContent = `Grade : F`;
                document.getElementById('grade').value = ` F`;
            }
        }
        
