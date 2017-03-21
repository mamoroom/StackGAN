#
# Extract text embeddings from the encoder
#
source /home/ubuntu/anaconda3/bin/activate py27
export HOME=/home/ubuntu/StackGAN
#echo ~

mkdir -p ~/Data/birds/example_captions/$2 2>/dev/null
chmod 777 ~/Data/flowers/example_captions/$2

CUB_ENCODER=lm_sje_flowers_c10_hybrid_0.00070_1_10_trainvalids.txt_iter16400.t7 \
CAPTION_PATH=~/Data/flowers/example_captions/$2 \
T7_PATH=~/Data/flowers/t7 \
GPU=0 \

export CUDA_VISIBLE_DEVICES=${GPU}


net_txt=~/models/text_encoder/${CUB_ENCODER} \
queries=$1 \
filenames=${T7_PATH}/$2.t7 \
/home/ubuntu/torch/install/bin/th ~/demo/get_embedding.lua

#
# Generate image from text embeddings
#
python ~/demo/demo.py \
--cfg ~/demo/cfg/flowers-demo.yml \
--gpu ${GPU} \
--caption_path ${T7_PATH}/$2.t7

cp ${T7_PATH}/$2/sentence0.jpg $HOME/html/data/$2.jpg
