// _______ ________ ____ Auto Zoom link geniration _______ _ ______  //
// function generateZoomLink(uniqueId,password) {
// console.log("join zoom meeting by this link :"+`https://zoom.us/j/${uniqueId}/pwd=${password}`);
// }
// generateZoomLink(5,123465698);
import { MeetingsOAuthClient } from "@zoom/rivet/meetings";
let clientId = "26c3YsRXQA6fEgVRAJDB9w" ;
let Client_Secret = "mX2Nt6pnLMP4GeDlznWZh8e46ppetVA3" ;
(async () => {
   const meetingsClient = new MeetingsOAuthClient({
      clientId: process.env.clientId,
      clientSecret: process.env.Client_Secret,
      webhooksSecretToken: process.env.WEBHOOKS_SECRET_TOKEN,
      installerOptions: {
         redirectUri: "",
         stateStore: ""
      }
   });

   // Rivet Events and Endpoints Go Here

   const server = await meetingsClient.start();
   console.log(
      `Zoom Rivet Events Server running on: ${JSON.stringify(server.address())}`
   );
})();