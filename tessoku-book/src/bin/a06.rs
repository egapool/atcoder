use proconio::{fastout, input};

#[fastout]
fn main() {
    input! {
        n: usize,
        q: usize,
        a: [usize; n],
        lr: [(usize, usize); q],
    }
    for (l, r) in lr.iter() {
        println!("{}", &a[(*l - 1)..*r].iter().sum::<usize>());
    }
}
