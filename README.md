# SIMILITUDE
#
## Similarity check with Jaccard, Cosine and other similarity algorithm
#
#
# Screenshots:
<img src="https://github.com/Priyaksheemahanta/Similitude/blob/main/css/img1.png">
<img src="https://github.com/Priyaksheemahanta/Similitude/blob/main/css/img2.png">
<img src="https://github.com/Priyaksheemahanta/Similitude/blob/main/css/img3.png">
<img src="https://github.com/Priyaksheemahanta/Similitude/blob/main/css/img4.png">
<img src="https://github.com/Priyaksheemahanta/Similitude/blob/main/css/img5.png">
<img src="https://github.com/Priyaksheemahanta/Similitude/blob/main/css/img6.png">
<img src="https://github.com/Priyaksheemahanta/Similitude/blob/main/css/img7.png">
<img src="https://github.com/Priyaksheemahanta/Similitude/blob/main/css/img8.png">
<img src="https://github.com/Priyaksheemahanta/Similitude/blob/main/css/img9.png">
#
#

### OBJECTIVES OF THE SYSTEM
#####  ANALYZING JACCARD SIMILARITY ALGORITHM
#####  ANALYZING COSINE SIMILARITY ALGORITHM
#####  ANALYZING PROPOSED ALGORITHM
#####  COMPARING ALL THE SIMILARITY METHODS
#####  WEB IMPLEMENTION OF THESE METHODS

##
##
##
The big idea is that you represent documents as vectors of features, and compare documents by
measuring the distance between these features. There are multiple ways to compute features that
capture the semantics of documents and multiple algorithms to capture dependency structure of
documents to focus on meanings of documents. Here we’ll compare the most popular ways
of computing sentence similarity and investigate how they perform.

First let’s take example of two sentences:
#### Sentence 1: Machine Learning is a subset of Artificial Intelligence
#### Sentence 2: Most Artificial Intelligence work now involves Machine Learning
Total unique words in these two contents is 12.
Sentence 1 has 4 words similar to sentence 2. As 4 words out of 8 words of content1 are same as content2’s words, it can be said that Content1 is 50% similar with content2.

# JACCARD SIMILARITY ALGORITHM
Jaccard similarity or intersection over union is defined as size of
intersection divided by size of union of two sets.

Here,
#### A= {Machine, Learning, is, a, subset, of, Artificial, Intelligence}
#### B= {Most, Artificial, Intelligence, work, now, involves, Machine, Learning}

## 
|A|=8 and |B|=8
(A ∩ B) = {Machine, Learning, Artificial, Intelligence}
|𝐴 ∩ 𝐵|= 4
 Jaccard similarity=4/ (8+8-4) =4/12=0.333(~)
It is seen that, although half of the total words were same, similarity percentage calculated
using Jaccard formula is 33% only.
##
##

# COSINE SIMILARITY ALGORITHM
 Cosine similarity calculates similarity by measuring the cosine of angle between two vectors.
Mathematically speaking, Cosine similarity is a measure of similarity between two non-zero vectors of an inner
product space that measures the cosine of the angle between them. The cosine of 0° is 1, and it is less than 1 for
any angle in the interval (0, π] radians. It is thus a judgment of orientation and not magnitude: two vectors with
the same orientation have a cosine similarity of 1, two vectors oriented at 90° relative to each other have a
similarity of 0, and two vectors diametrically opposed have a similarity of -1, independent of their magnitude.

The cosine similarity is advantageous because even if the two similar documents are far apart by
the Euclidean distance (due to the size of the document), chances are they may still be oriented
closer together. The smaller the angle, higher the cosine similarity.
#

Now,
#### Words= {Machine, Learning, is, a, subset, of, Artificial, Intelligence, Most, work, now, involves} 

Vector A representation = [1,1,1,1,1,1,1,1,0,0,0,0]
Vector B representation = [1,1,0,0,0,0,1,1,1,1,1,1]
Vector A * Vector B = 1*1+1*1+1*0+……………..+0*1= 4
Magnitude of B = √𝟖
 Cosine similarity=4/ (√8.√8) =4/7.9=0.503
This exhibits that sentence 1 is 50.3% similar to sentence 2.

#
#

# PROPOSED APPROACH
 The Proposed approach was published on the paper “A New Similarity Measure with
Length Factor for Plagiarism Detection”, International Journal of Computer Applications (0975 – 8887)
Volume 72– No.14, May 2013 by Dr Dhrubajyoti Baruah, Assistant Professor, Dept. of Computer
Application, Jorhat Engineering College and Anjana Kakoti Mahanta, PhD Professor,
Computer Science Dept., Gauhati University.

#### A= {Machine, Learning, is, a, subset, of, Artificial, Intelligence}
|A|=8
A-B= {is, a, subset, of}
|A-B|=4
 Proposed similarity= 1- (4/8) =0.5
 This exhibits that content1 is 50% similar to content2.So, it may be
concluded that the proposed similarity measure yields better result in
comparison to the other measures. 


