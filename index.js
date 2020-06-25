//jaccard_similarity functions
function textJaccardSimilarity(txt1,txt2,intersect){
  var length1 = txt1.length;
  var length2 = txt2.length;
  var lengthIntersect = intersect.length;
  var result= lengthIntersect/((length1+length2)-lengthIntersect);//(A#B)/()
  console.log(result);
  return result;
}
// function getSimilarityScoreJaccard(value){
//     return value.toFixed(4)*100;
// }

//cosineSimilarity functions
function wordCountMap(words){
  return words.reduce((count, word) => {
        count[word] = (count[word] || 0) + 1;
        console.log(count);
        return count;
        //count: no. of particular word;[count={"the":2,"world":1,.....}]
  }, {})
}
function addWordsToDictionary(wordCountmap, dict){
    for(let key in wordCountmap){
        dict[key] = true;
    }
}

function wordMapToVector(map,dict){
    let wordCountVector = [];
    for (let term in dict){
        wordCountVector.push(map[term] || 0);
    }
    console.log(wordCountVector);
    return wordCountVector;
}
function dotProduct(vecA, vecB){
    let product = 0;
    for(let i=0;i<vecA.length;i++){
        product += vecA[i] * vecB[i];
    }
    console.log(product);
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
    const wordCountA = wordCountMap(txtA);
    const wordCountB = wordCountMap(txtB);
    let dict = {};
    addWordsToDictionary(wordCountA,dict);
    addWordsToDictionary(wordCountB,dict);
    const vectorA = wordMapToVector(wordCountA,dict);
    const vectorB = wordMapToVector(wordCountB,dict);
    return cosineSimilarity(vectorA, vectorB);
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
function getSimilarityScore(val){
    return val.toFixed(4)*100;
}
