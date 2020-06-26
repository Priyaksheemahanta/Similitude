//jaccard_similarity functions
function textJaccardSimilarity(txt1,txt2,intersect){
  var length1 = txt1.length;
  var length2 = txt2.length;
  var lengthIntersect = intersect.length;
  var result= lengthIntersect/((length1+length2)-lengthIntersect);//(A#B)/()
  //console.log(result);
  return result;
}
// truncate decimal numbers to decimal places
function truncate(v, p) {
    var s = Math.pow(10, p || 0);
    return Math.trunc(s * v) / s;
}

//converting the result into percentage
function getSimilarityScoreJaccard(val){
    var value= truncate(val, 5)*100;
    return value;
}
// function getSimilarityScoreJaccard(value){
//     return value.toFixed(4)*100;
// }

//cosineSimilarity functions
function countWord(words){
  return words.reduce((count, word) => {
        count[word] = (count[word] || 0) + 1;
        //console.log(count);
        return count;
        //count: no. of particular word;[count={"the":2,"world":1,.....}]
  }, {})
}
function addDictionary(countWord, dict){
    for(let key in countWord){
        dict[key] = true;
    }
}

function convoToVector(map,dict){
    let wordCountVector = [];
    for (let term in dict){
        wordCountVector.push(map[term] || 0);
    }
    return wordCountVector;
}
function dotProduct(vecA, vecB){
    let product = 0;
    for(let i=0;i<vecA.length;i++){
        product += vecA[i] * vecB[i];
    }
    return product;
}

function magnitude(vec){
    let sum = 0;
    for (let i = 0;i<vec.length;i++){
        sum += vec[i] * vec[i];
    }
    return Math.sqrt(sum);
}

function cosineSimilarity(vecA,vecB){
    return dotProduct(vecA,vecB)/ (magnitude(vecA) * magnitude(vecB));
}
function textCosineSimilarity(txtA,txtB){
    const textA=txtA.map(v => v.toLowerCase());
    console.log(textA);
    const textB=txtB.map(v => v.toLowerCase());
    //var words=word.map(v => v.toLowerCase());
    const wordCountA = countWord(textA);
    const wordCountB = countWord(textB);
    let dict = {};
    addDictionary(wordCountA,dict);
    addDictionary(wordCountB,dict);
    const vectorA = convoToVector(wordCountA,dict);
    const vectorB = convoToVector(wordCountB,dict);
    const value = cosineSimilarity(vectorA, vectorB);
    console.log(value);
    return value;
}
//converting the result into percentage
function getSimilarityScoreCosine(val){
    var value= truncate(val, 5)*100;
    return value;
}


// function checkSimilarity(){
//     var text1 = ["i","like","jec"];
//     var text2 = ["jec","has","mca","jec","has","btech"];
//
//     var similarity = getSimilarityScore(textCosineSimilarity(text1,text2));
//     $("#similarity").text(similarity);
//     console.log(similarity);
// }

//proposed algorithm
function textProposedSimilarity(txt1,except){
  var length1 = txt1.length;
  var lengthexcept = except.length;
  var result= 1-(lengthexcept/length1)
  console.log(result);
  return result;
}
//converting the result into percentage
function getSimilarityScoreProposed(val){
    var value= truncate(val, 5)*100;
    return value;
}
